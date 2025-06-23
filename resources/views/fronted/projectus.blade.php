@extends('fronted.master')
@section('title', 'Home Page')

@section('maincontent')
    <!-- Page specific content here -->



    <!-- Start Projects
    ============================================= -->
    <div class="projects-area default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Project Studies</h4>
                        <h2 class="title">Latest showcase and <br> solutions to our customers!</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="masonary">
                        <div class="gallery-items text-center colums-3 mixed">
                            @foreach($projects as $project)
                                <div class="gallery-item gallery-style-one">
                                    <div class="item gallery-mixed-item">
                                        <div class="thumb">
                                            <img src="{{ asset('uploads/project/' . $project->image) }}" alt="{{ $project->title }}">
                                        </div>
                                        <div class="content">
                                            <div class="info">
                                             <h4>
                                                <a href="{{ route('project.details1', ['title' => $project->title]) }}">
                                                    {{ $project->title }}
                                                </a>
                                            </h4>

                                                <select name="project_info_id" class="form-control"@disabled(true) >
                                                    @foreach($projectInfo as $category)
                                                        <option value="{{ $category->id }}" {{ $project->project_info_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span>{{ $project->category ?? 'Technology' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Projects -->

@endsection
