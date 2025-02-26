@extends('layouts.app')

@section('content')
<section class="header results">
    <div class="logo clearfix"><img src="/images/logo_sportovec_roku.svg" width="425" alt="Logo Sportovec roku MČ Praha 15" class="img-fluid"></div>
    <h1>Nominace</h1>
    <p>
        Veřejnost měla možnost nominovat sportovce na těchto stránkách do 31. 12. 2024.<br>
        Následně v lednu proběhla kontrola obdržených nominací.
    </p>
    <p>&nbsp;</p>
    <p>A zde jsou výsledky nominací v jednotlivých kategoriích:</p>
</section>
@foreach($nominations as $groupId => $group)
    <section class="group group{{ $groupId }} results clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $group['name'] }}</h2>
            </div>
        </div>
        <ul>
            @foreach($group['values'] as $valueId => $value)
                <li>
                    <p><strong>{{ $value['header'] }}</strong> {!! $value['description'] !!}</p>
                </li>
            @endforeach
        </ul>
    </section>
@endforeach
<section class="header results">
    <h1>Hlasování</h1>
    <p>
        Na jednání Výboru volnočasových aktivit dne 15. 1. 2025 proběhlo hlasování členů Výboru,<br>
        na jehož základě byli vybráni vítězové v jednotlivých kategoriích:
    </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</section>
@foreach($groups as $groupId => $group)
    <section class="group group{{ $groupId }} results clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $group['name'] }}</h2>
            </div>
        </div>
        <ul>
            @foreach($group['values'] as $valueId => $value)
                <li>
                    <p><strong>{{ $value['header'] }}</strong> {!! $value['description'] !!}</p>
                </li>
            @endforeach
        </ul>
    </section>
@endforeach
<section class="header results pt-2 pb-5">
    <h1>Slavnostní vyhlášení</h1>
    <p>
        Vyhlášení a předání cen proběhlo 12. 2. 2025 od 17 hodin ve Švehlově sokolovně.
    </p>
    <p class="message text-center mb-5 pb-5"><strong>Děkujeme všem nominovaným sportovcům a srdečně gratulujeme vítězům.<br>Těšíme se na další ročník.</strong></p>
    @if($gallery)
    <h2><img src="/images/text_fotogalerie.svg" alt="Fotogalerie předávání cen" class="img-fluid" width="528"></h2>
    @else
    <p class="mb-5 pb-5">&nbsp;</p>
    @endif
</section>
@if($gallery)
<section class="gallery pt-5 pb-5">
    <div class="row">
@foreach($gallery as $image => $description)
        <div class="col-md-4 @if($loop->iteration > 3) d-none @endif">
            <a href="/images/gallery/{{ $year }}/{{ $image }}.jpg" data-lightbox="gallery" data-title="{{ $description }}"><img src="/images/gallery/{{ $year }}/{{ $image }}.jpg" alt="" class="img-fluid"></a>
            <p class="mt-3">{{ $description }}</p>
        </div>
@endforeach
    </div>
    <p class="mt-4 text-center"><a href="#" id="showGallery">Více fotografií najdete zde v galerii nebo po kliknutí na jakoukoli fotografii.</a></p>
    <p style="text-align: center;"><iframe width="560" height="315" src="https://www.youtube.com/embed/vwP2o_oQ-6o?si=1Njq-pn-CQ7Sxp1o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></p>
</section>
@endif
@endsection
