@foreach ($projects as $project)
<div class="item" data-category="transition">
    <div class="item-inner">
        <div class="portfolio-img">
            <div class="overlay-project"></div>
            <!-- .overlay-project -->
            <img src="{{ isset($project->image) ? $project->image : asset('front/images/home02/recent-project-img-1.jpg') }}"
                alt="{{isset($project->title) ? $project->title : 'Na'}}">
            <ul class="project-link-option">
                <li class="project-link"><a href="project_single.html"><i class="fa fa-link"
                            aria-hidden="true"></i></a></li>
                <li class="project-search"><a href="front/images/home02/recent-project-img-1.jpg"
                        data-rel="lightcase:myCollection"><i class="fa fa-search-plus"
                            aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <!-- /.portfolio-img -->
        <div class="recent-project-content">
            <h4><a href="project_single.html">{{isset($project->title) ? $project->title : 'Na'}}</a></h4>
            <p>By : <span><a href="#">Green Forest</a></span></p>
        </div>
        <!-- .latest-port-content -->
    </div>
    <!-- .item-inner -->
</div>
@endforeach