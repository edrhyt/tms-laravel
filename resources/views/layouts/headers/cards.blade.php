<div class="header bg-gradient-primary pb-7 pt-4 pt-md-7">
    <div class="container-fluid">
        <div class="header-body">
            @if(isset($breadcrumb))
            <div class="row align-items-center py-4">
                <div class="col-lg-10 col-md-12 col-10">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark m-0">
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
                <div class="col-lg-2 col-2 col-md-2 text-right">
                    <a href="{{$create_route ?? ''}}" class="btn btn-sm btn-neutral">Tambah</a>
                </div>
                @endisset
                @isset($referer)
                <a href="{{$referer}}" class="col-lg-2 col-md-2 col-2"><button class="btn btn-danger w-100">Kembali</button></a>
                @endisset
            </div>
            @endif
            @isset($info)
                <div class="container mb-5 p-0 info">
                    <span class="info-dot-white">Lihat Data {{$info}}</span> 
                    <span class="sub-info-dot-white">Halaman ini berisi Data {{$info}} dengan kode:<strong> {{$order->number}}</strong></span>
                </div>
            @endisset
        </div>
    </div>
</div>
