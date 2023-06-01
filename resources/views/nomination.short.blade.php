@extends('layouts.app')

@section('content')
<form action="" method="post" class="needs-validation" novalidate>
    @csrf
    <section class="header">
        <div class="logo clearfix"><img src="/images/logo_sportovec_roku.svg" width="425" alt="Logo Sportovec roku MČ Praha 15" class="img-fluid"></div>
        <h1><img src="/images/nominacni_listek_nadpis.svg" alt="Nominační lístek" class="img-fluid"></h1>
        <p>
            Městská část Praha 15, Výbor volnočasových aktivit a vnějších vztahů,<br>
            vyhlásila anketu Sportovec roku MČ Praha 15.
        </p>
        <p><a href="/files/sportovec_roku_2021_nominacni_listek.pdf" target="_blank">Nominační lístek ve formátu PDF ke stažení.</a></p>
    </section>
    <section class="group group1 clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>Nejoblíbenější sport Prahy 15</h2>
            </div>
            <div class="col-md-4 text-right radio @if(old('group.1') === "1") selected @endif">
                <label class="" for="group_1_1">v této kategorii nenominuji</label>
                <input type="radio" id="group_1_1" name="group[1]" value="1" class="form-check-inline" @if(old('group.1') === "1") checked @endif>
                <div></div>
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="name1" @error('name.1') class="red" @enderror>Sportovní aktivita, kterou provozuje sportovní klub se sídlem v Praze 15:</label>
                <input type="text" name="name[1]" id="name1" value="{{ old('name.1') }}" class="form-control @error('name.1') is-invalid @enderror">
            </div>
        </div>
    </section>
    <section class="group group6 clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>Trenér roku</h2>
            </div>
            <div class="col-md-4 text-right radio @if(old('group.6') === "1") selected @endif">
                <label class="" for="group_6_1">v této kategorii nenominuji</label>
                <input type="radio" id="group_6_1" name="group[6]" value="1" class="form-check-inline" @if(old('group.6') === "1") checked @endif>
                <div></div>
            </div>
        </div>
        <div class="row form">
            <div class="col-md-4">
                <label for="fname6" @error('fname.6') class="red" @enderror>Jméno:</label>
                <input type="text" name="fname[6]" id="fname6" value="{{ old('fname.6') }}" class="form-control @error('fname.6') is-invalid @enderror">
            </div>
            <div class="col-md-4">
                <label for="lname6" @error('lname.6') class="red" @enderror>Příjmení:</label>
                <input type="text" name="lname[6]" id="lname6" value="{{ old('lname.6') }}" class="form-control @error('lname.6') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-4">
                <label for="membership6" @error('membership.6') class="red" @enderror>Sportovní klub, kde trenér působí:</label>
                <input type="text" name="membership[6]" id="membership6" value="{{ old('membership.6') }}" class="form-control @error('membership.6') is-invalid @enderror">
            </div>
            <div class="col-md-4">
                <label for="team6" @error('team.6') class="red" @enderror>Jméno svěřence, název koletivu:</label>
                <input type="text" name="team[6]" id="team6" value="{{ old('team.6') }}" class="form-control @error('team.6') is-invalid @enderror">
            </div>
        </div>
    </section>
    <section class="form">
        <h2>Odesílací formulář</h2>
        <div class="form-row">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                <label for="nfname" @error('nfname') class="red" @enderror>Jméno:</label>
                <input type="text" class="form-control @error('nfname') is-invalid @enderror" id="nfname" name="nfname" value="{{ old('nfname') }}" required>
                <div class="invalid-feedback">
                    Vyplňte jméno!
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                <label for="nlname" @error('nlname') class="red" @enderror>Příjmení:</label>
                <input type="text" class="form-control @error('nlname') is-invalid @enderror" id="nlname" name="nlname" value="{{ old('nlname') }}" required>
                <div class="invalid-feedback">
                    Vyplňte příjmení!
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <label for="nemail" @error('nemail') class="red" @enderror>E-mail:</label>
                <input type="email" class="form-control @error('nemail') is-invalid @enderror" id="nemail" name="nemail" value="{{ old('nemail') }}" required>
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
                <strong>
                    Po dobu trvání ankety dávám souhlas s <a href="https://www.praha15.cz/ochrana-osobnich-udaju-gdpr-a-poverenec/ms-1397/p1=1397" target="_blank">GDPR</a>.
                </strong>
            </div>
        </div>
        @if($errors->any())
        <p class="red">Zapomněli jste nominovat. V případě potřeby zaškrtněte políčko "v této kategorii nenominuji".</p>
        @endif
        @if(session('message') == 'thanks')
            <p class="message text-center"><strong>Děkujeme za nominaci v anketě Sportovec roku 2020.</strong></p>
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
