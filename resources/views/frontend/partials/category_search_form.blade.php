<div class="search-form-widget-slider relative">
    <form action="{{ route($routeName, $category->name) }}" method="GET">
        <div class="flex wd-search items-center justify-center gap-[30px]">
            <!-- Location Select -->
            <div class="form-group flex items-center gap-3">
                <i class="icon-18 mt-4"></i>
                <label for="location" class="mb-0 mt-4">Location</label>
                <select name="location" class="form-control ml-2" id="location" required>
                    <option value="">Select Location</option>
                    @foreach($allLocations as $location)
                        <option value="{{ $location }}" {{ request('location') === $location ? 'selected' : '' }}>
                            {{ $location }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn-search flex items-center gap-2">
                    <i class="icon-Vector5"></i>Search
                </button>
            </div>
        </div>
    </form>
</div>
