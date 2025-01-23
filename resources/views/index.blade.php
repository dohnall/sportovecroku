@extends('layouts.app')

@section('content')
<form action="" method="post" class="needs-validation" novalidate>
    @csrf
    <section class="header">
        <div class="logo clearfix"><img src="/images/logo_sportovec_roku.svg" width="425" alt="Logo Sportovec roku MČ Praha 15" class="img-fluid"></div>
        <!--h1><img src="/images/text_hlasujte.svg" alt="HLASUJTE!" class="img-fluid"></h1>
        <p>
            Právě probíhá hlasovací část ankety Sportovec roku MČ Praha 15,<br>
            hlasovat lze od <strong>15. ledna do 29. února 2024</strong><br>
            v níže uvedených kategoriích.
        </p>
        <p>
            Pravidla hlasování naleznete <a href="/files/pravidla.pdf" target="_blank">zde</a>.
        </p-->
        <div class="invitation">
            <p class="first">
                Srdečně vás zveme<br>
                na vyhlášení výsledků ankety<br>
                <strong>Sportovec roku 2023 MČ Praha 15</strong>
            </p>
            <p class="second">
                20. 5. 2024<br>
                <strong>od 17.00 do 19.00</strong>
            </p>
            <p class="third">
                <strong>Švehlova sokolovna</strong><br>
                U Branek 674/7, Praha 15 – Hostivař
            </p>
        </div>
    </section>
@foreach($groups as $groupId => $group)
    <section class="group group{{ $groupId }} clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $group['name'] }}</h2>
            </div>
            <!--div class="col-md-4 text-right radio @if(old('group.'.$groupId) === "0") selected @endif">
                <label class="" for="group_{{ $groupId }}_0">pro tuto kategorii nehlasuji</label>
                <input type="radio" id="group_{{ $groupId }}_0" name="group[{{ $groupId }}]" value="0" class="form-check-inline" @if(old('group.'.$groupId) === "0") checked @endif>
                <div></div>
            </div-->
        </div>
        <ul>
    @foreach($group['values'] as $valueId => $value)
            <li @if(old('group.'.$groupId) == $valueId) class="selected" @endif>
                <!--div class="radio">
                    <div></div>
                    <input type="radio" name="group[{{ $groupId }}]" value="{{ $valueId }}" @if(old('group.'.$groupId) == $valueId) checked @endif>
                </div-->
                <p><strong>{{ $value['header'] }}</strong> {!! $value['description'] !!}</p>
            </li>
    @endforeach
        </ul>
    </section>
@endforeach
    <!--section class="form">
        <h2>Odesílací formulář</h2>
        <div class="form-row">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                <label for="fname" @error('fname') class="red" @enderror>Jméno:</label>
                <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname') }}" required>
                <div class="invalid-feedback">
                    Vyplňte jméno!
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                <label for="lname" @error('lname') class="red" @enderror>Příjmení:</label>
                <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname') }}" required>
                <div class="invalid-feedback">
                    Vyplňte příjmení!
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <label for="email" @error('email') class="red" @enderror>E-mail:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @else
                <div class="invalid-feedback">
                    Vyplňte e-mail!
                </div>
                @enderror
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                <label for="validationServerSubmit">&nbsp;</label>
                <div class="input-group">
                    <button class="btn btn-primary" type="submit">Odeslat</button>
                </div>
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-12">
                <div class="form-check @if(old('agree') == 1) selected @endif">
                    <div></div>
                    <input class="form-check-input" type="checkbox" name="agree" value="1" id="agree" required @if(old('agree') == 1) checked @endif>
                    <label class="form-check-label" for="agree">
                        Seznámil(a) jsem se s podmínkami zpracování osobních údajů a beru na vědomí, že odesláním hlasování bude zpracováváno jméno, příjmení, IP adresa a emailová adresa. Informace o zpracování osobních údajů jsou k dispozici <a href="https://www.praha15.cz/ochrana-osobnich-udaju-gdpr-a-poverenec/ms-1397/p1=1397" target="_blank">ZDE</a>.
                    </label>
                </div>
            </div>
        </div-->
        @if($errors->has('group.1') || $errors->has('group.2') || $errors->has('group.3') || $errors->has('group.4') || $errors->has('group.5') || $errors->has('group.6'))
        <p class="red">Zapomněli jste hlasovat. V případě potřeby zaškrtněte políčko "pro tuto kategorii nehlasuji".</p>
        @endif
        @error('agree')
            <p class="red">Pro odeslání hlasů musíte souhlasit s podmínkami zpracování osobních údajů.</p>
        @enderror
        @if(session('message') == 'confirm')
        <p class="message text-center"><strong>Děkujeme za potvrzení hlasování.</strong></p>
        @endif
        @if(session('message') == 'unknown')
            <p class="message text-center red"><strong>Hlas nepotvrzen, neznámý identifikátor.</strong></p>
        @endif
        @if(session('message') == 'old')
            <p class="message text-center red"><strong>Tento hlas již byl potvrzen.</strong></p>
        @endif
        @if(session('message') == 'thanks')
            <p class="message text-center"><strong>Děkujeme za hlasování v anketě Sportovec roku 2023.</strong><br>Právě jsme Vám odeslali potvrzující e-mail, který prosím potvrďte.<br>Bez potvrzení nebude hlasování platné.</p>
        @endif
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                            $(':invalid').prev('label').addClass('red');
                            $(':valid').prev('label').removeClass('red');
                        }, false);
                    });
                    $(document).on('click', 'section.group li, section.group .row .radio', function() {
                        let THIS = $(this);
                        THIS.parents('section').find('.selected').removeClass('selected');
                        THIS.parents('section').find('input:radio').prop('checked', false).attr('checked', false);
                        THIS.find('input:radio').prop('checked', true).attr('checked', true);
                        THIS.addClass('selected');
                    });
                    $(document).on('click', '.form-check', function() {
                        let THIS = $(this);
                        if(THIS.hasClass('selected')) {
                            THIS.removeClass('selected');
                            THIS.find(':checkbox').prop('checked', false).attr('checked', false);
                        } else {
                            THIS.addClass('selected');
                            THIS.find(':checkbox').prop('checked', true).attr('checked', true);
                        }
                    });
                    $(document).on('click', '.form-check label', function() {
                        let THIS = $(this);
                        let parent = THIS.parent();
                        if(parent.hasClass('selected')) {
                            parent.removeClass('selected');
                            THIS.find(':checkbox').prop('checked', false).attr('checked', false);
                        } else {
                            parent.addClass('selected');
                            THIS.find(':checkbox').prop('checked', true).attr('checked', true);
                        }
                    });
                    @if ($errors->any() || session('message'))
                    $('html, body').animate({
                        scrollTop: $('section.form h2').offset().top
                    }, 1000);
                    @endif
                }, false);
            })();
        </script>
    </section>
</form>
@endsection
