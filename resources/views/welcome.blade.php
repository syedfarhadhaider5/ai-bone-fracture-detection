<!-- upload.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Form Autofill with Document Data Extraction</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Include jQuery.toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/index_style.css">

</head>
<body>

<div class="container">
    <svg  class="background-svg-1" width="184" height="192" viewBox="0 0 184 192" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M182.648 183.128C178.597 187.405 171.028 191.799 163.237 191.977C157.571 192.103 152.323 190.012 148.058 185.927C139.232 177.468 138.372 158.735 137.621 142.22C137.204 133.157 136.747 122.877 134.696 119.768C131.836 115.376 124.509 108.471 107.735 111.458C94.4152 113.834 81.7884 115.329 73.6959 107.665C64.5031 98.9588 66.3544 85.5644 68.5325 76.244C69.271 73.0119 70.4408 69.8949 72.0105 66.9765C67.2371 63.1964 63.8062 58.7353 62.4015 54.3978C60.8072 49.4882 61.1485 43.5448 61.4696 37.8066C61.9457 29.5112 62.3974 21.6751 57.4255 18.3185C52.9599 15.3123 37.4838 14.4287 30.2947 16.7929C23.7769 18.9234 13.5899 18.9589 1.99423 6.93367C1.6401 6.5666 1.36158 6.13357 1.17454 5.65932C0.987495 5.18506 0.895589 4.67887 0.904109 4.16963C0.912629 3.66038 1.02138 3.15807 1.22417 2.69136C1.42696 2.22466 1.71981 1.80269 2.086 1.44957C2.45218 1.09646 2.88452 0.819116 3.35835 0.63335C3.83218 0.447587 4.33822 0.357049 4.84756 0.366916C5.3569 0.376784 5.85958 0.486848 6.32689 0.690842C6.7942 0.894836 7.21699 1.18879 7.57112 1.55585C12.4264 6.59173 19.8904 12.0448 27.8628 9.42376C35.8352 6.80273 54.2649 6.8425 61.7549 11.8939C70.3895 17.7206 69.7629 28.6339 69.2095 38.2642C68.9095 43.5287 68.6214 48.5014 69.7664 52.0262C70.775 55.1189 73.3834 58.1558 76.531 60.6768C76.9819 60.2006 77.4049 59.754 77.8356 59.3765C82.0627 55.4357 86.9774 53.4477 91.2962 53.9361C96.6192 54.5284 100.113 58.7801 100.195 64.7704C100.25 70.0573 97.3594 73.7039 92.4487 74.5175C88.6575 75.1291 83.6402 73.9231 78.5462 71.2419C77.4414 73.3904 76.607 75.6679 76.0619 78.0227C73.2511 90.0426 74.1576 97.4483 79.0031 102.037C84.4653 107.21 95.0526 105.831 106.352 103.814C122.037 101.019 134.401 105.177 141.174 115.524C144.395 120.438 144.815 129.89 145.362 141.875C146.018 156.197 146.832 174.017 153.401 180.345C156.233 183.027 159.368 184.313 163.024 184.23C168.933 184.098 174.615 180.307 176.996 177.793C177.702 177.048 178.675 176.614 179.703 176.588C180.73 176.561 181.727 176.944 182.474 177.651C183.221 178.359 183.657 179.333 183.687 180.361C183.716 181.388 183.336 182.384 182.63 183.129L182.648 183.128ZM83.3056 64.9216C86.4005 66.4052 89.3016 67.1611 91.1914 66.8526C91.9094 66.7359 92.4752 66.6434 92.4525 64.8379C92.4131 61.8384 91.0498 61.6861 90.4681 61.6233C88.7028 61.4381 85.9689 62.5013 83.2972 64.9304L83.3056 64.9216Z" fill="currentColor"></path></svg>
    <svg  class="background-svg-2" width="184" height="192" viewBox="0 0 184 192" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M182.648 183.128C178.597 187.405 171.028 191.799 163.237 191.977C157.571 192.103 152.323 190.012 148.058 185.927C139.232 177.468 138.372 158.735 137.621 142.22C137.204 133.157 136.747 122.877 134.696 119.768C131.836 115.376 124.509 108.471 107.735 111.458C94.4152 113.834 81.7884 115.329 73.6959 107.665C64.5031 98.9588 66.3544 85.5644 68.5325 76.244C69.271 73.0119 70.4408 69.8949 72.0105 66.9765C67.2371 63.1964 63.8062 58.7353 62.4015 54.3978C60.8072 49.4882 61.1485 43.5448 61.4696 37.8066C61.9457 29.5112 62.3974 21.6751 57.4255 18.3185C52.9599 15.3123 37.4838 14.4287 30.2947 16.7929C23.7769 18.9234 13.5899 18.9589 1.99423 6.93367C1.6401 6.5666 1.36158 6.13357 1.17454 5.65932C0.987495 5.18506 0.895589 4.67887 0.904109 4.16963C0.912629 3.66038 1.02138 3.15807 1.22417 2.69136C1.42696 2.22466 1.71981 1.80269 2.086 1.44957C2.45218 1.09646 2.88452 0.819116 3.35835 0.63335C3.83218 0.447587 4.33822 0.357049 4.84756 0.366916C5.3569 0.376784 5.85958 0.486848 6.32689 0.690842C6.7942 0.894836 7.21699 1.18879 7.57112 1.55585C12.4264 6.59173 19.8904 12.0448 27.8628 9.42376C35.8352 6.80273 54.2649 6.8425 61.7549 11.8939C70.3895 17.7206 69.7629 28.6339 69.2095 38.2642C68.9095 43.5287 68.6214 48.5014 69.7664 52.0262C70.775 55.1189 73.3834 58.1558 76.531 60.6768C76.9819 60.2006 77.4049 59.754 77.8356 59.3765C82.0627 55.4357 86.9774 53.4477 91.2962 53.9361C96.6192 54.5284 100.113 58.7801 100.195 64.7704C100.25 70.0573 97.3594 73.7039 92.4487 74.5175C88.6575 75.1291 83.6402 73.9231 78.5462 71.2419C77.4414 73.3904 76.607 75.6679 76.0619 78.0227C73.2511 90.0426 74.1576 97.4483 79.0031 102.037C84.4653 107.21 95.0526 105.831 106.352 103.814C122.037 101.019 134.401 105.177 141.174 115.524C144.395 120.438 144.815 129.89 145.362 141.875C146.018 156.197 146.832 174.017 153.401 180.345C156.233 183.027 159.368 184.313 163.024 184.23C168.933 184.098 174.615 180.307 176.996 177.793C177.702 177.048 178.675 176.614 179.703 176.588C180.73 176.561 181.727 176.944 182.474 177.651C183.221 178.359 183.657 179.333 183.687 180.361C183.716 181.388 183.336 182.384 182.63 183.129L182.648 183.128ZM83.3056 64.9216C86.4005 66.4052 89.3016 67.1611 91.1914 66.8526C91.9094 66.7359 92.4752 66.6434 92.4525 64.8379C92.4131 61.8384 91.0498 61.6861 90.4681 61.6233C88.7028 61.4381 85.9689 62.5013 83.2972 64.9304L83.3056 64.9216Z" fill="currentColor"></path></svg>
    <svg  class="background-svg-3" width="184" height="192" viewBox="0 0 184 192" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M182.648 183.128C178.597 187.405 171.028 191.799 163.237 191.977C157.571 192.103 152.323 190.012 148.058 185.927C139.232 177.468 138.372 158.735 137.621 142.22C137.204 133.157 136.747 122.877 134.696 119.768C131.836 115.376 124.509 108.471 107.735 111.458C94.4152 113.834 81.7884 115.329 73.6959 107.665C64.5031 98.9588 66.3544 85.5644 68.5325 76.244C69.271 73.0119 70.4408 69.8949 72.0105 66.9765C67.2371 63.1964 63.8062 58.7353 62.4015 54.3978C60.8072 49.4882 61.1485 43.5448 61.4696 37.8066C61.9457 29.5112 62.3974 21.6751 57.4255 18.3185C52.9599 15.3123 37.4838 14.4287 30.2947 16.7929C23.7769 18.9234 13.5899 18.9589 1.99423 6.93367C1.6401 6.5666 1.36158 6.13357 1.17454 5.65932C0.987495 5.18506 0.895589 4.67887 0.904109 4.16963C0.912629 3.66038 1.02138 3.15807 1.22417 2.69136C1.42696 2.22466 1.71981 1.80269 2.086 1.44957C2.45218 1.09646 2.88452 0.819116 3.35835 0.63335C3.83218 0.447587 4.33822 0.357049 4.84756 0.366916C5.3569 0.376784 5.85958 0.486848 6.32689 0.690842C6.7942 0.894836 7.21699 1.18879 7.57112 1.55585C12.4264 6.59173 19.8904 12.0448 27.8628 9.42376C35.8352 6.80273 54.2649 6.8425 61.7549 11.8939C70.3895 17.7206 69.7629 28.6339 69.2095 38.2642C68.9095 43.5287 68.6214 48.5014 69.7664 52.0262C70.775 55.1189 73.3834 58.1558 76.531 60.6768C76.9819 60.2006 77.4049 59.754 77.8356 59.3765C82.0627 55.4357 86.9774 53.4477 91.2962 53.9361C96.6192 54.5284 100.113 58.7801 100.195 64.7704C100.25 70.0573 97.3594 73.7039 92.4487 74.5175C88.6575 75.1291 83.6402 73.9231 78.5462 71.2419C77.4414 73.3904 76.607 75.6679 76.0619 78.0227C73.2511 90.0426 74.1576 97.4483 79.0031 102.037C84.4653 107.21 95.0526 105.831 106.352 103.814C122.037 101.019 134.401 105.177 141.174 115.524C144.395 120.438 144.815 129.89 145.362 141.875C146.018 156.197 146.832 174.017 153.401 180.345C156.233 183.027 159.368 184.313 163.024 184.23C168.933 184.098 174.615 180.307 176.996 177.793C177.702 177.048 178.675 176.614 179.703 176.588C180.73 176.561 181.727 176.944 182.474 177.651C183.221 178.359 183.657 179.333 183.687 180.361C183.716 181.388 183.336 182.384 182.63 183.129L182.648 183.128ZM83.3056 64.9216C86.4005 66.4052 89.3016 67.1611 91.1914 66.8526C91.9094 66.7359 92.4752 66.6434 92.4525 64.8379C92.4131 61.8384 91.0498 61.6861 90.4681 61.6233C88.7028 61.4381 85.9689 62.5013 83.2972 64.9304L83.3056 64.9216Z" fill="currentColor"></path></svg>
    <svg  class="background-svg-4" width="184" height="192" viewBox="0 0 184 192" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M182.648 183.128C178.597 187.405 171.028 191.799 163.237 191.977C157.571 192.103 152.323 190.012 148.058 185.927C139.232 177.468 138.372 158.735 137.621 142.22C137.204 133.157 136.747 122.877 134.696 119.768C131.836 115.376 124.509 108.471 107.735 111.458C94.4152 113.834 81.7884 115.329 73.6959 107.665C64.5031 98.9588 66.3544 85.5644 68.5325 76.244C69.271 73.0119 70.4408 69.8949 72.0105 66.9765C67.2371 63.1964 63.8062 58.7353 62.4015 54.3978C60.8072 49.4882 61.1485 43.5448 61.4696 37.8066C61.9457 29.5112 62.3974 21.6751 57.4255 18.3185C52.9599 15.3123 37.4838 14.4287 30.2947 16.7929C23.7769 18.9234 13.5899 18.9589 1.99423 6.93367C1.6401 6.5666 1.36158 6.13357 1.17454 5.65932C0.987495 5.18506 0.895589 4.67887 0.904109 4.16963C0.912629 3.66038 1.02138 3.15807 1.22417 2.69136C1.42696 2.22466 1.71981 1.80269 2.086 1.44957C2.45218 1.09646 2.88452 0.819116 3.35835 0.63335C3.83218 0.447587 4.33822 0.357049 4.84756 0.366916C5.3569 0.376784 5.85958 0.486848 6.32689 0.690842C6.7942 0.894836 7.21699 1.18879 7.57112 1.55585C12.4264 6.59173 19.8904 12.0448 27.8628 9.42376C35.8352 6.80273 54.2649 6.8425 61.7549 11.8939C70.3895 17.7206 69.7629 28.6339 69.2095 38.2642C68.9095 43.5287 68.6214 48.5014 69.7664 52.0262C70.775 55.1189 73.3834 58.1558 76.531 60.6768C76.9819 60.2006 77.4049 59.754 77.8356 59.3765C82.0627 55.4357 86.9774 53.4477 91.2962 53.9361C96.6192 54.5284 100.113 58.7801 100.195 64.7704C100.25 70.0573 97.3594 73.7039 92.4487 74.5175C88.6575 75.1291 83.6402 73.9231 78.5462 71.2419C77.4414 73.3904 76.607 75.6679 76.0619 78.0227C73.2511 90.0426 74.1576 97.4483 79.0031 102.037C84.4653 107.21 95.0526 105.831 106.352 103.814C122.037 101.019 134.401 105.177 141.174 115.524C144.395 120.438 144.815 129.89 145.362 141.875C146.018 156.197 146.832 174.017 153.401 180.345C156.233 183.027 159.368 184.313 163.024 184.23C168.933 184.098 174.615 180.307 176.996 177.793C177.702 177.048 178.675 176.614 179.703 176.588C180.73 176.561 181.727 176.944 182.474 177.651C183.221 178.359 183.657 179.333 183.687 180.361C183.716 181.388 183.336 182.384 182.63 183.129L182.648 183.128ZM83.3056 64.9216C86.4005 66.4052 89.3016 67.1611 91.1914 66.8526C91.9094 66.7359 92.4752 66.6434 92.4525 64.8379C92.4131 61.8384 91.0498 61.6861 90.4681 61.6233C88.7028 61.4381 85.9689 62.5013 83.2972 64.9304L83.3056 64.9216Z" fill="currentColor"></path></svg>
    <div class="row">
        <div class="col-md-1 col-sm-12"></div>
        <div class="col-md-5 col-sm-12">
            <center>
                <img  src="img/pngtree-the-lab-doctor-smiles-png-image_11526321.png" width="350"/>

            </center>
            <br>
            <h1 style="font-weight: 700; text-align: center;">AI-Powered Instant Bone Break Detection</h1>
        </div>
        <div class="col-md-5 col-sm-12 left-side-area">
            <div id="drop-area">
                <p>
                    <i class="fa-solid fa-arrow-up-from-bracket"
                      style="color: #454545; font-size: 5rem; margin: 10px 10px"></i></p>
                <h5>or drop a file</h5>
                <p>or</p>
                <label class="btn btn-primary">
                    Upload Image <input type="file" id="fileInput" accept=".png, .jpg, .jpeg"
                                  style="display: none;">
                </label>
            </div>
        </div>
        <div class="col-md-1 col-sm-12"></div>
    </div>
    <div id="loading-overlay">
        <div class="loading-icon"></div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS from CDN -->
<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include jQuery.toast JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script>
    // Define removeFile function globally
    function removeFile(index) {
        $('#file-' + index).remove();
        $('#uploadBtn').hide();
    }
    // Show loading overlay
    function showLoading() {
        $('#loading-overlay').show();
    }

    // Hide loading overlay
    function hideLoading() {
        $('#loading-overlay').hide();
    }
    $(document).ready(function () {
        // CSRF Token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Drag & Drop functionality
        var dropArea = document.getElementById('drop-area');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });
        if (dropArea.classList.contains('highlight')) {
            console.log('Class "highlight" has been added.');
        } else {
            console.log('Class "highlight" has not been added.');
        }
        function highlight(e) {
            dropArea.classList.add('highlight');
        }

        function unhighlight(e) {
            dropArea.classList.remove('highlight');
        }

        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            var files = e.dataTransfer.files;
            handleFiles(files);
        }

        // File Input functionality
        var fileInput = document.getElementById('fileInput');
        fileInput.addEventListener('change', function () {
            var files = this.files;
            handleFiles(files);
        });

        // File upload function
        function handleFiles(files) {
            $('#progress-bar-container').hide();
            $('#file-list').empty();
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (file.size > 50 * 1024 * 1024) { // Check file size (in bytes)
                    $.toast({
                        heading: 'Error',
                        text: 'File size exceeds 50MB limit',
                        icon: 'error',
                        position: 'top-right',
                        loader: false,
                        loaderBg: '#fff',
                        hideAfter: 3000
                    });
                    continue; // Skip this file
                }
                $('#file-list').append('<div id="file-' + i + '" class="file-info">' + file.name + ' <button class="btn btn-danger btn-sm" ><i onclick="removeFile(' + i + ')" class="fa-solid fa-trash-can"></i></button></div>');
                uploadFile(file);
            }
        }

        function uploadFile(file) {
            var formData = new FormData();
            formData.append('file', file);

            $.ajax({
                url: '{{ route('upload') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (e) {
                        if (e.lengthComputable) {
                            var percentComplete = (e.loaded / e.total) * 100;
                            $('#progress-bar').css('width', percentComplete + '%');
                            $('#status').text(percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                beforeSend: showLoading, // Show loading overlay before sending request
                success: function (response) {
                    //console.log(response.success);
                    if(response.status === 200){
                        $.toast({
                            heading: 'Success',
                            text: response.success,
                            icon: 'success',
                            position: 'top-right',
                            loader: false, // Whether to show loader animation
                            loaderBg: '#fff', // Loader background color
                            hideAfter: 3000 // Hide the toast after 3 seconds (adjust as needed)
                        });
                        $("#exampleModal").modal("show");
                        $("#response_output").html(response.description)
                        $("#img-xray").attr("src",response.image)
                        // window.location.href = response.redirect_url;
                    }else{
                        $.toast({
                            heading: 'Error',
                            text: response.error,
                            icon: 'error',
                            position: 'top-right',
                            loader: false,
                            loaderBg: '#fff',
                            hideAfter: 3000
                        });
                    }

                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error
                    var errorMessage;
                    try {
                        var responseJson = JSON.parse(xhr.responseText);
                        errorMessage = responseJson.error;
                    } catch (e) {
                        errorMessage = "An unexpected error occurred.";
                    }
                    $.toast({
                        heading: 'Error',
                        text: errorMessage,
                        icon: 'error',
                        position: 'top-right',
                        loader: false,
                        loaderBg: '#fff',
                        hideAfter: 3000
                    });
                },
                complete: hideLoading // Hide loading overlay when request completes
            });
        }
    });
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bone Condition Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="img-xray" src="" class="img-fluid" alt="Bone X-ray">
                    </div>
                    <div class="col-md-6">
                        <p id="response_output"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
