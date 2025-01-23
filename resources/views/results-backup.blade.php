@extends('layouts.app')

@section('content')
<section class="header results">
    <div class="logo clearfix"><img src="/images/logo_sportovec_roku.svg" width="425" alt="Logo Sportovec roku MČ Praha 15" class="img-fluid"></div>
    <h1><img src="/images/text_vysledky.svg" alt="Výsledky hlasování" class="img-fluid" width="511"></h1>
    <p>
        V <strong>lednu 2025</strong> byly v rámci jednání Výboru volnočasových aktivit a vnějších vztahů předány trofeje vítězům v kategoriích:
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
<section class="header pt-2 pb-5">
    <p class="message text-center mb-5 pb-5"><strong>Děkujeme všem hlasujícím a nominovaným sportovcům a srdečně gratulujeme vítězům.<br>Těšíme se na další ročník.</strong></p>
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
</section>
@endif
@endsection
