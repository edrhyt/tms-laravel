<div class="header bg-gradient-primary pb-7 pt-4 pt-md-7">
    <div class="container-fluid">
        <div class="header-body">
            @if(isset($breadcrumb))
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-md-12 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                            @foreach ($breadcrumb as $key => $item)
                                <li class="breadcrumb-item @if($loop->last) {{__('active')}} @endif" @if($loop->last) aria-current="page" @endif>
                                    <a @if(!$loop->last) href="{{$item['route']}}" @endif>{{$item['title']}}</a>
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
                @isset($create_route)
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{$create_route ?? ''}}" class="btn btn-sm btn-neutral">Tambah</a>
                </div>
                @endisset
            </div>
            @endif
            @isset($info)
                <div class="container mb-5 p-0 info">
                    Lihat Data {{$info}}
                </div>
            @endisset
        </div>
    </div>
</div>
