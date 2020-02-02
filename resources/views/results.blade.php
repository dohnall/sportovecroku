@extends('layouts.app')

@section('content')
<section class="header results">
    <div class="logo clearfix"><img src="/images/logo_sportovec_roku.svg" alt="Logo Sportovec roku MČ Praha 15" class="img-fluid"></div>
    <h1><img src="/images/text_vysledky.svg" alt="Výsledky hlasování" class="img-fluid" width="511"></h1>
    <p>
        Dne <strong>23.1.2020</strong> byly vyhlášeny výsledky v anketě <strong>Sportovec roku 2019</strong><br>
        za účasti starosty, radních a zastupitelů Prahy 15.<br>
        Ceny předaly sportovní legendy Antonín Panenka a Karol Dobiáš.
    </p>
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
    <h2><img src="/images/text_fotogalerie.svg" alt="Fotogalerie předávání cen" class="img-fluid" width="528"></h2>
</section>
<section class="gallery pt-5 pb-5">
    <div class="row">
@foreach($gallery as $image => $description)
        <div class="col-md-4 @if($loop->iteration > 3) d-none @endif">
            <a href="/images/gallery/{{ $image }}.jpg" data-lightbox="gallery" data-title="{{ $description }}"><img src="/images/gallery/{{ $image }}.jpg" alt="" class="img-fluid"></a>
            <p class="mt-3">{{ $description }}</p>
        </div>
@endforeach
    </div>
    <p class="mt-4 text-center">Více fotografií najdete po rozkliknutí uvnitř galerie.</p>
</section>
<section class="footer">
    <img src="/images/logo_mc_praha_15.svg" alt="Logo MČ Praha 15">
    <p>Pořadatelem ankety Sportovec roku je MČ Praha 15.</p>
    <p>Technickou část ankety Sportovec roku zajišťuje společnost MOO Design s.r.o.</p>
    <p>„Všichni nominovaní jsou občany MČ Praha 15 nebo sportují ve sportovních klubech v MČ Praze 15 a s nominací vyjádřili svůj souhlas.“</p>
</section>
@endsection
