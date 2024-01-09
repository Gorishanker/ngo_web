
@foreach ($images as $image)
<div class="item">
    <div class="item-inner">
        <div class="portfolio-img">
            <div class="overlay-project"></div>
            <!-- .overlay-project -->
            <img style="width:400px; height: 317px;" src="{{$image->file}}" alt="{{isset($image->category->category_name) ? $image->category->category_name : 'Image'}}">
            <div class="project-plus">
                <a href="{{$image->file}}" target="_blank"
                    data-rel="lightcase:myCollection"><i class="fa fa-plus"
                        aria-hidden="true"></i></a>
            </div>
            <div class="recent-project-content">
                <p><a href="javascript:void(0);">{{isset($image->category->category_name) ? $image->category->category_name : 'Image'}}</a></p>
            </div>
        </div>
        <!-- .latest-port-content -->
        <!-- /.portfolio-img -->
    </div>
    <!-- .item-inner -->
</div>
<!-- .items -->
@endforeach