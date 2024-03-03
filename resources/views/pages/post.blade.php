@extends('page-layout.page-master')
@section('vendorCss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-5e2ESR8Ycmos6g3gAKr1Jvwye8sW4U1u/cAKulfVJnkakCcMqhOudbtPnvJ+nbv7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("src/assets/css/light/elements/tooltip.css") }}">
    <link rel="stylesheet" href="{{ asset("src/assets/css/dark/elements/tooltip.css") }}">
@endsection
@section('customCss')
    <style>
        .remaining-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px;
            border-radius: 5px;
        }
        .grid {
            display: flex;
            flex-wrap: wrap;
            margin: 0 auto;
        }

        .grid-item {
            width: calc(33.33% - 20px); /* Adjust the width as needed */
            margin-bottom: 20px; /* Adjust the gap between items */
            position: relative; /* Ensure the grid item is relative for absolute positioning */
        }

        .grid-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        .overlay {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            z-index: 1; /* Ensure overlay appears on top of the image */
        }
        .remaining-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px;
            border-radius: 5px;
        }

    </style>
@endsection
@section('vendorScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <script src="{{ asset("src/plugins/src/waves/waves.min.js") }}"></script>
@endsection
@section('customScript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var grid = document.querySelector('.grid');
        var gridItems = Array.from(grid.querySelectorAll('.grid-item'));

        // Sort grid items based on image dimensions
        gridItems.sort(function(a, b) {
            var aWidth = a.querySelector('img').naturalWidth;
            var bWidth = b.querySelector('img').naturalWidth;
            return bWidth - aWidth; // Sort in descending order of width
        });

        // Append sorted grid items to the grid
        gridItems.forEach(function(item) {
            grid.appendChild(item);
        });

        // Initialize Masonry
        var masonry = new Masonry(grid, {
            itemSelector: '.grid-item',
            columnWidth: '.grid-item', // Set to the width of your grid items
            gutter: 5, // Adjust as needed
            percentPosition: true
        });
    });

    </script>
@endsection
@section('content-body')
    <hr class="my-4">
        <div class="d-flex mb-4">
            <div class="avatar my-auto">
                <img alt="avatar" src="{{ asset("src/assets/img/profile-12.jpeg") }}" class="rounded-circle" />
            </div>
            <textarea class="form-control ms-2" placeholder="What's on you mind, {{ ucwords(auth()->user()->first_name) }}?"></textarea>
            <button type="button" class="btn btn-primary ms-2 text-nowrap">Post</button>
        </div>
        
        <div id="posts-container">
        <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex flex-row gap-2">
                    <div class="avatar avatar-sm avatar-indicators avatar-online">
                        <img alt="avatar" src="../src/assets/img/profile-1.jpeg" class="rounded-circle" />
                    </div>
                    <div class="row">
                        <span>Ray Simon Flores</span>
                        <small>Just now &middot;<i class="fa-solid fa-user-group ms-1"></i></i></small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">Im a programmer :)</p>
                <div class="img-holder"></div>
                <div class="row my-auto mt-2 mt-sm-1 mb-0 pb-0">
                    <div class="col-6">
                        <a href="javascript:void(0);" class="bs-popover rounded" data-bs-container="body" data-bs-trigger="hover" data-bs-content="Bonbon<br>Alfred Paluyo<br>Romasanta Vasquez Paluyo" data-bs-html="true">
                            <span class="d-block d-sm-none"><i class="far fa-thumbs-up"></i> 10</span>
                            <span class="d-none d-sm-inline"><i class="far fa-thumbs-up"></i> Bong Go and 9 others</span></a>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-row-reverse gap-2">
                            <a href="javascript:void(0);" class="text-end">
                                <span class="d-none d-sm-inline">3 Shares</span>
                                <span class="d-block d-sm-none">3 <i class="far fa-share-square"></i></span>
                            </a>
                            <a href="javascript:void(0);" class="text-end">
                                <span class="d-none d-sm-inline">2 Comment</span>
                                <span class="d-block d-sm-none">2 <i class="far fa-comment-alt"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between px-sm-5">
                    <a href="javascript:void(0);"><i class="far fa-thumbs-up"></i> Like </a>
                    <a href="javascript:void(0);"><i class="far fa-comment-alt"></i> Comment </a>
                    <a href="javascript:void(0);"><i class="far fa-share-square"></i> Share </a>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex flex-row gap-2">
                    <div class="avatar avatar-sm avatar-indicators avatar-online">
                        <img alt="avatar" src="../src/assets/img/profile-6.jpeg" class="rounded-circle" />
                    </div>
                    <div class="row">
                            <span>Grace M. Sacro</span>
                            <small>9 hrs &middot;<i class="fas fa-globe-asia ms-1"></i></small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">Feeling happy for the new beginning</p>
                <div class="grid">
                    <div class="grid-item">
                        <a href="#" class="position-relative">
                            <img class="img-fluid rounded" src="../src/assets/img/profile-4.jpeg" alt="Profile 4">
                        </a>
                    </div>
                    <div class="grid-item">
                        <a href="#" class="position-relative">
                            <img class="img-fluid rounded" src="../src/assets/img/tl-2.jpeg" alt="Profile 4">
                        </a>
                    </div>
                    <div class="grid-item">
                        <a href="#" class="position-relative">
                            <img class="img-fluid rounded" src="../src/assets/img/tl-4.jpeg" alt="Profile 4">
                        </a>
                    </div>
                    <div class="grid-item">
                        <a href="#" class="position-relative">
                            <img class="img-fluid rounded" src="../src/assets/img/tl-4.jpeg" alt="Profile 4">
                        </a>
                    </div>
                    <div class="grid-item position-relative last-item">
                        <a href="#" class="position-relative">
                            <img class="img-fluid rounded" src="../src/assets/img/profile-11.jpeg" alt="Profile 10">
                            <div class="remaining-overlay bg-dark text-light">+6</div>
                        </a>
                    </div>
                </div>
                
                <div class="row my-auto mt-2 mt-sm-1 mb-0 pb-0">
                    <div class="col-6">
                        <a href="javascript:void(0);" class="bs-popover rounded" data-bs-container="body" data-bs-trigger="hover" data-bs-content="Bonbon<br>Alfred Paluyo<br>Romasanta Vasquez Paluyo" data-bs-html="true">
                            <span class="d-block d-sm-none"><i class="far fa-thumbs-up"></i> 124</span>
                            <span class="d-none d-sm-inline"><i class="far fa-thumbs-up"></i> Bonbon and 123 others</span></a>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-row-reverse gap-2">
                            <a href="javascript:void(0);" class="text-end">
                                <span class="d-none d-sm-inline">20 Shares</span>
                                <span class="d-block d-sm-none">20 <i class="far fa-share-square"></i></span>
                            </a>
                            <a href="javascript:void(0);" class="text-end">
                                <span class="d-none d-sm-inline">21 Comment</span>
                                <span class="d-block d-sm-none">21 <i class="far fa-comment-alt"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between px-sm-5">
                    <a href="javascript:void(0);"><i class="far fa-thumbs-up"></i> Like </a>
                    <a href="javascript:void(0);"><i class="far fa-comment-alt"></i> Comment </a>
                    <a href="javascript:void(0);"><i class="far fa-share-square"></i> Share </a>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex flex-row gap-2">
                    <div class="avatar avatar-sm avatar-indicators avatar-online">
                        <img alt="avatar" src="../src/assets/img/profile-12.jpeg" class="rounded-circle" />
                    </div>
                    <div class="row">
                            <span>Hans Sebastian Ortoja</span>
                            <small>9 hrs &middot;<i class="fas fa-globe-asia ms-1"></i></small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">Ut purus elit, molestie et dignissim ac, maximus sit amet massa. Suspendisse luctus molestie luctus. Curabitur pharetra commodo ornare. Suspendisse cursus leo non magna sollicitudin, in blandit leo euismod. </p>
                <div class="img-holder"></div>
                <div class="row my-auto mt-2 mt-sm-1 mb-0 pb-0">
                    <div class="col-6">
                        <a href="javascript:void(0);" class="bs-popover rounded" data-bs-container="body" data-bs-trigger="hover" data-bs-content="Bonbon<br>Alfred Paluyo<br>Romasanta Vasquez Paluyo" data-bs-html="true">
                            <span class="d-block d-sm-none"><i class="far fa-thumbs-up"></i> 4</span>
                            <span class="d-none d-sm-inline"><i class="far fa-thumbs-up"></i> CJ Strange and 3 others</span></a>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-row-reverse gap-2">
                            <a href="javascript:void(0);" class="text-end">
                                <span class="d-none d-sm-inline">20 Shares</span>
                                <span class="d-block d-sm-none">20 <i class="far fa-share-square"></i></span>
                            </a>
                            <a href="javascript:void(0);" class="text-end">
                                <span class="d-none d-sm-inline">21 Comment</span>
                                <span class="d-block d-sm-none">21 <i class="far fa-comment-alt"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between px-sm-5">
                    <a href="javascript:void(0);"><i class="far fa-thumbs-up"></i> Like </a>
                    <a href="javascript:void(0);"><i class="far fa-comment-alt"></i> Comment </a>
                    <a href="javascript:void(0);"><i class="far fa-share-square"></i> Share </a>
                </div>
            </div>
        </div>
    </div>

@endsection