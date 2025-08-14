@extends('frontend.layouts.app')

@section('title', $category->name . ' Tours')

@section('content')
<main id="main">
    @include('frontend.partials.breadcrumb', ['title' => $category->name . ' Tours'])

    <!-- Widget Select Form -->
    <div class="mt--82 z-index3 relative">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-12">
                @include('frontend.partials.category_search_form', [
                    'routeName' => 'categoryTours', // change per view
                    'allLocations' => $allLocations,
                    'category' => $category
                ])
            </div>
        </div>
    </div>
</div>


    <!-- Widget Select Form -->

    <!-- Tour List -->
    <section class="tour-destination pd-main">
        <div class="tf-container">
            <div class="row">
                @forelse ($tours as $item)
                    <div class="col-sm-6 col-lg-4 mb-37">
                        <div class="tf-widget-destination">
                            <a href="{{ route('tourDetails', $item->slug) }}" class="destination-imgae">
                                   @if(!empty($item->duration))
                                                <span class="tour active">{{ $item->duration }}</span>
                                            @endif
                                <img src="{{ asset("uploads/tour/$item->image") }}" alt="{{ $item->title }}">
                            </a>
                            <div class="destination-content">
                                <span class="nation">{{ $item->title }}</span>
                                <div class="flex-two btn-destination">
                                    <h6 class="title"><a href="{{ route('tourDetails', $item->slug) }}">View tours</a></h6>
                                    <a href="{{ route('tourDetails', $item->slug) }}" class="flex-five btn-view">
                                        <i class="icon-Vector-32"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No tours found for this category.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- End Tour List -->

    <!-- Call to Action -->
    {{-- <section class="mb--93">
        <div class="tf-container">
            <div class="callt-to-action flex-two">
                <div class="callt-to-action-content flex-three">
                    <div class="image">
                        <img src="{{ asset('assets/images/page/ready.png') }}" alt="Image">
                    </div>
                    <div class="content">
                        <h2 class="title-call">Ready to adventure and enjoy natural</h2>
                        <p class="des">Lorem ipsum dolor sit amet, consectetur notted adipisicin</p>
                    </div>
                </div>
                <img src="{{ asset('assets/images/page/vector4.png') }}" alt="" class="shape-ab">
                <div class="callt-to-action-button">
                    <a href="#" class="get-call">Let's get started</a>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Call to Action -->
</main>
@endsection

@push('styles')
<style>
    .nice-select {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .nice-select .list {
        display: none;
        position: absolute;
        width: 100%;
        background: #fff;
        border: 1px solid #ccc;
        z-index: 10;
        max-height: 200px;
        overflow-y: auto;
    }

    .nice-select.open .list {
        display: block;
    }

    .nice-select .option {
        padding: 10px;
        cursor: pointer;
    }

    .nice-select .option:hover {
        background: #f0f0f0;
    }

    .nice-select .current {
        display: inline-block;
        padding: 10px;
        background: #f9f9f9;
        border: 1px solid #ccc;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.querySelector('.nice-select');
    const listItems = dropdown.querySelectorAll('.option');
    const current = dropdown.querySelector('.current');
    const hiddenInput = document.querySelector('input[name="location"]');

    // Initialize: set current text from hidden input if it has value
    if (hiddenInput.value) {
        current.textContent = hiddenInput.value;
    }

    // Toggle dropdown open/close
    dropdown.addEventListener('click', function (e) {
        this.classList.toggle('open');
    });

    // Handle selecting an option
    listItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.stopPropagation();
            const value = item.getAttribute('data-value');
            current.textContent = value;
            hiddenInput.value = value;
            dropdown.classList.remove('open');
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('open');
        }
    });

    // Optional: validate that a location is selected before submitting
    const searchBtn = document.querySelector('.btn-search');
    if (searchBtn) {
        searchBtn.addEventListener('click', function(e) {
            const value = hiddenInput.value.trim();
            if (!value) {
                e.preventDefault();
                alert('Please select a location.');
            }
        });
    }
});
</script>

@endpush
