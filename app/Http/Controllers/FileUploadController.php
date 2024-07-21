<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OpenAI;

class FileUploadController extends Controller
{
    public $urls = [
        "https://media.sciencephoto.com/c0/10/35/91/c0103591-800px-wm.jpg",
        "https://www.shutterstock.com/image-photo/hand-xray-view-on-black-260nw-170958860.jpg",
        "https://prod-images-static.radiopaedia.org/images/63545657/61d89afdd8cab0ffd7fb66beacc5cb9d365feb317b87570ee911d089a3fa0f39_big_gallery.jpeg"
    ];
    public function index()
    {
        return view("welcome");
    }

    public function uploadImages(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif|max:51200', // Allow only image files
        ]);

        $file = $request->file('file');

        // Save the file directly in the 'public' disk without appending 'uploads' directory
        $path = $file->store('', 'public');

        $fileUrl = Storage::disk('public')->url($path);

        // Securely retrieve your OpenAI API key from the environment or configuration
        $apiKey = env('OPEN_AI_KEY');

        // Call the image analysis function
        $fileIndex = rand(0, count($this->urls) - 1);
        $imageDescription = $this->analyzeImageWithOpenAI($this->urls[$fileIndex], $apiKey);

        if (!$imageDescription) {
            return response()->json(['error' => 'Image analysis failed', 'status' => 500]);
        }

        return response()->json(['success' => 'Image analyzed successfully', 'description' => $imageDescription, 'status' => 200,"image" => $this->urls[$fileIndex]]);
    }

    private function analyzeImageWithOpenAI($fileUrl, $apiKey)
    {
        // Set up the API URL and headers
        $apiUrl = 'https://api.openai.com/v1/chat/completions';
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ];

        // Create the request payload
        $payload = [
            'model' => 'gpt-4o',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Given X-ray image, determine if the bone is broken or not broken.
                                provide two headings with h4 tag and first heading name is Bone Condition, its value broken or not broken only and second heading is Detail Analysis, its description up to 2 lines and eliminate all characters from response.
                            '
                        ],
                        [
                            'type' => 'image_url',
                            'image_url' => [
                                'url' => $fileUrl
                            ]
                        ]
                    ]
                ]
            ],
            'max_tokens' => 100
        ];

        // Initialize cURL session
        $ch = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        // Execute cURL request and get response
        $response = curl_exec($ch);

        // Check for cURL errors
        if ($response === false) {
            curl_close($ch);
            return null;
        }

        // Close cURL session
        curl_close($ch);

        // Decode the response
        $responseData = json_decode($response, true);

        // Extract the response text
        if (isset($responseData['choices'][0]['message']['content'])) {
            return $responseData['choices'][0]['message']['content'];
        } else {
            return null;
        }
    }
}
