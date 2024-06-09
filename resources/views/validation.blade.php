@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Validasi Truck Normal/Overdimensi</h4>
                        <div class="card">
                            <div class="card-people mt-auto">
                                <div class="image-container">
                                    <img id="image" src="path/to/your/image.jpg" alt="people">
                                </div>
                                <div class="buttons-container mt-3">
                                    <button id="prevBtn" type="button" class="btn btn-success">Normal</button>
                                    <button id="nextBtn" type="button" class="btn btn-danger">OverDimensi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var images = @json($images);
        var currentIndex = 0;
        var imageElement = document.getElementById('image');
        var prevBtn = document.getElementById('prevBtn');
        var nextBtn = document.getElementById('nextBtn');

        // Function to show image at given index
        function showImage(index) {
            if (index >= 0 && index < images.length) {
                imageElement.src = images[index];
                currentIndex = index;
            } else {
                imageElement.src =
                    "https://w7.pngwing.com/pngs/743/651/png-transparent-no-entry-logo-no-symbol-sign-forbidden-miscellaneous-text-trademark.png";
            }
        }

        // Show initial image
        showImage(currentIndex);

        // Function to send request
        function sendRequest(params) {
            // Here you can send an AJAX request to the server with currentIndex or any other data
            // Example using fetch API
            fetch('/validation/move', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token if needed
                    },
                    body: JSON.stringify({
                        url: images[currentIndex],
                        dir: params
                    }) // Send currentIndex or any other data
                })
                .then(response => {
                    // Handle response if needed
                })
                .catch(error => {
                    // Handle error if needed
                });
        }

        // Event listener for previous button
        prevBtn.addEventListener('click', function() {
            sendRequest('images/dataset/normal/');
            showImage(currentIndex + 1);
        });

        // Event listener for next button
        nextBtn.addEventListener('click', function() {
            sendRequest('images/dataset/OD/');
            showImage(currentIndex + 1);
        });
    </script>
@endsection
