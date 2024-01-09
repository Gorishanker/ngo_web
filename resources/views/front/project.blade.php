@foreach ($projects as $project)
<div class="item" data-category="transition">
    <div class="item-inner">
        <div class="portfolio-img">
            <div class="overlay-project"></div>
            <!-- .overlay-project -->
            <img style="width: 402px; height: 304px;" src="{{ isset($project->image) ? $project->image : asset('front/images/home02/recent-project-img-1.jpg') }}"
                alt="{{isset($project->title) ? $project->title : 'Na'}}">
            <ul class="project-link-option">
                <li class="project-link"><a href="{{route('front.projectView', $project->slug)}}"><i class="fa fa-eye"
                            aria-hidden="true"></i></a></li>
                <li class="project-search"><a href="{{ isset($project->image) ? $project->image : asset('front/images/home02/recent-project-img-1.jpg') }}"
                        data-rel="lightcase:myCollection"><i class="fa fa-search-plus"
                            aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <!-- /.portfolio-img -->
        <div class="recent-project-content">
            <h4><a href="{{route('front.projectView', $project->slug)}}">{{isset($project->title) ? $project->title : 'Na'}}</a></h4>
            <p>By : <span><a href="javascript:void(0);">{{isset($project->author) ? $project->author : 'Na'}}</a></span></p>
        </div>
        <!-- .latest-port-content -->
    </div>
    <!-- .item-inner -->
</div>
@endforeach
