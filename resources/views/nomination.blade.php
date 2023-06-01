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
        <p>
            Nominovaný musí být v MČ Praha 15 nebo být členem klubu<br>
            působícího v MČ Praha 15.
        </p>
    </section>
    <section class="group group1 clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>Sportovní tým nad 18 let</h2>
            </div>
            <div class="col-md-4 text-right radio @if(old('group.1') === "1") selected @endif">
                <label class="" for="group_1_1">v této kategorii nenominuji</label>
                <input type="radio" id="group_1_1" name="group[1]" value="1" class="form-check-inline" @if(old('group.1') === "1") checked @endif>
                <div></div>
            </div>
        </div>
        <div class="row form">
            <div class="col-md-4">
                <label for="name1" @error('name.1') class="red" @enderror>Název týmu:</label>
                <input type="text" maxlength="150" name="name[1]" id="name1" value="{{ old('name.1') }}" class="form-control @error('name.1') is-invalid @enderror">
            </div>
            <div class="col-md-4">
                <label for="membership1" @error('membership.1') class="red" @enderror>Členství v TJ/SK, sportovní odvětví:</label>
                <input type="text" maxlength="150" name="membership[1]" id="membership1" value="{{ old('membership.1') }}" class="form-control @error('membership.1') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="success1" @error('success.1') class="red" @enderror>Uveďte dosažené sportovní úspěchy nominovaného za rok 2022:</label>
                <input type="text" maxlength="150" name="success[1]" id="success1" value="{{ old('success.1') }}" class="form-control @error('success.1') is-invalid @enderror">
            </div>
        </div>
    </section>
    <section class="group group2 clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>Sportovní tým do 18 let</h2>
            </div>
            <div class="col-md-4 text-right radio @if(old('group.2') === "1") selected @endif">
                <label class="" for="group_2_1">v této kategorii nenominuji</label>
                <input type="radio" id="group_2_1" name="group[2]" value="1" class="form-check-inline" @if(old('group.2') === "1") checked @endif>
                <div></div>
            </div>
        </div>
        <div class="row form">
            <div class="col-md-4">
                <label for="name2" @error('name.2') class="red" @enderror>Název týmu:</label>
                <input type="text" maxlength="150" name="name[2]" id="name2" value="{{ old('name.2') }}" class="form-control @error('name.2') is-invalid @enderror">
            </div>
            <div class="col-md-4">
                <label for="membership2" @error('membership.2') class="red" @enderror>Členství v TJ/SK, sportovní odvětví:</label>
                <input type="text" maxlength="150" name="membership[2]" id="membership2" value="{{ old('membership.2') }}" class="form-control @error('membership.2') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="success2" @error('success.2') class="red" @enderror>Uveďte dosažené sportovní úspěchy nominovaného za rok 2022:</label>
                <input type="text" maxlength="150" name="success[2]" id="success2" value="{{ old('success.2') }}" class="form-control @error('success.2') is-invalid @enderror">
            </div>
        </div>
    </section>
    <section class="group group3 clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>Jednotlivec nad 18 let</h2>
            </div>
            <div class="col-md-4 text-right radio @if(old('group.3') === "1") selected @endif">
                <label class="" for="group_3_1">v této kategorii nenominuji</label>
                <input type="radio" id="group_3_1" name="group[3]" value="1" class="form-check-inline" @if(old('group.3') === "1") checked @endif>
                <div></div>
            </div>
        </div>
        <div class="row form">
            <div class="col-md-3">
                <label for="fname3" @error('fname.3') class="red" @enderror>Jméno:</label>
                <input type="text" maxlength="150" name="fname[3]" id="fname3" value="{{ old('fname.3') }}" class="form-control @error('fname.3') is-invalid @enderror">
            </div>
            <div class="col-md-3">
                <label for="lname3" @error('lname.3') class="red" @enderror>Příjmení:</label>
                <input type="text" maxlength="150" name="lname[3]" id="lname3" value="{{ old('lname.3') }}" class="form-control @error('lname.3') is-invalid @enderror">
            </div>
            <div class="col-md-2">
                <label for="year3" @error('year.3') class="red" @enderror>Rok narození:</label>
                <input type="text" maxlength="150" name="year[3]" id="year3" value="{{ old('year.3') }}" class="form-control @error('year.3') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="membership3" @error('membership.3') class="red" @enderror>Členství v TJ/SK, sportovní odvětví:</label>
                <input type="text" maxlength="150" name="membership[3]" id="membership3" value="{{ old('membership.3') }}" class="form-control @error('membership.3') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="success3" @error('success.3') class="red" @enderror>Uveďte dosažené sportovní úspěchy nominovaného za rok 2022:</label>
                <input type="text" maxlength="150" name="success[3]" id="success3" value="{{ old('success.3') }}" class="form-control @error('success.3') is-invalid @enderror">
            </div>
        </div>
    </section>
    <section class="group group4 clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>Jednotlivec do 18 let</h2>
            </div>
            <div class="col-md-4 text-right radio @if(old('group.4') === "1") selected @endif">
                <label class="" for="group_4_1">v této kategorii nenominuji</label>
                <input type="radio" id="group_4_1" name="group[4]" value="1" class="form-check-inline" @if(old('group.4') === "1") checked @endif>
                <div></div>
            </div>
        </div>
        <div class="row form">
            <div class="col-md-3">
                <label for="fname4" @error('fname.4') class="red" @enderror>Jméno:</label>
                <input type="text" maxlength="150" name="fname[4]" id="fname4" value="{{ old('fname.4') }}" class="form-control @error('fname.4') is-invalid @enderror">
            </div>
            <div class="col-md-3">
                <label for="lname4" @error('lname.4') class="red" @enderror>Příjmení:</label>
                <input type="text" maxlength="150" name="lname[4]" id="lname4" value="{{ old('lname.4') }}" class="form-control @error('lname.4') is-invalid @enderror">
            </div>
            <div class="col-md-2">
                <label for="year4" @error('year.4') class="red" @enderror>Rok narození:</label>
                <input type="text" maxlength="150" name="year[4]" id="year4" value="{{ old('year.4') }}" class="form-control @error('year.4') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="membership4" @error('membership.4') class="red" @enderror>Členství v TJ/SK, sportovní odvětví:</label>
                <input type="text" maxlength="150" name="membership[4]" id="membership4" value="{{ old('membership.4') }}" class="form-control @error('membership.4') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="success4" @error('success.4') class="red" @enderror>Uveďte dosažené sportovní úspěchy nominovaného za rok 2022:</label>
                <input type="text" maxlength="150" name="success[4]" id="success4" value="{{ old('success.4') }}" class="form-control @error('success.4') is-invalid @enderror">
            </div>
        </div>
    </section>
    <section class="group group5 clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>Senior 60+</h2>
            </div>
            <div class="col-md-4 text-right radio @if(old('group.5') === "1") selected @endif">
                <label class="" for="group_5_1">v této kategorii nenominuji</label>
                <input type="radio" id="group_5_1" name="group[5]" value="1" class="form-check-inline" @if(old('group.5') === "1") checked @endif>
                <div></div>
            </div>
        </div>
        <div class="row form">
            <div class="col-md-3">
                <label for="fname5" @error('fname.5') class="red" @enderror>Jméno:</label>
                <input type="text" maxlength="150" name="fname[5]" id="fname5" value="{{ old('fname.5') }}" class="form-control @error('fname.5') is-invalid @enderror">
            </div>
            <div class="col-md-3">
                <label for="lname5" @error('lname.5') class="red" @enderror>Příjmení:</label>
                <input type="text" maxlength="150" name="lname[5]" id="lname5" value="{{ old('lname.5') }}" class="form-control @error('lname.5') is-invalid @enderror">
            </div>
            <div class="col-md-2">
                <label for="year5" @error('year.5') class="red" @enderror>Rok narození:</label>
                <input type="text" maxlength="150" name="year[5]" id="year5" value="{{ old('year.5') }}" class="form-control @error('year.5') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="membership5" @error('membership.5') class="red" @enderror>Členství v TJ/SK, sportovní odvětví:</label>
                <input type="text" maxlength="150" name="membership[5]" id="membership5" value="{{ old('membership.5') }}" class="form-control @error('membership.5') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="success5" @error('success.5') class="red" @enderror>Uveďte dosažené sportovní úspěchy nominovaného za rok 2022:</label>
                <input type="text" maxlength="150" name="success[5]" id="success5" value="{{ old('success.5') }}" class="form-control @error('success.5') is-invalid @enderror">
            </div>
        </div>
    </section>
    <section class="group group6 clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>Trenér roku kolektivních sportů</h2>
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
                <input type="text" maxlength="150" name="fname[6]" id="fname6" value="{{ old('fname.6') }}" class="form-control @error('fname.6') is-invalid @enderror">
            </div>
            <div class="col-md-4">
                <label for="lname6" @error('lname.6') class="red" @enderror>Příjmení:</label>
                <input type="text" maxlength="150" name="lname[6]" id="lname6" value="{{ old('lname.6') }}" class="form-control @error('lname.6') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-4">
                <label for="membership6" @error('membership.6') class="red" @enderror>Členství v TJ/SK, sportovní odvětví:</label>
                <input type="text" maxlength="150" name="membership[6]" id="membership6" value="{{ old('membership.6') }}" class="form-control @error('membership.6') is-invalid @enderror">
            </div>
            <div class="col-md-4">
                <label for="team6" @error('team.6') class="red" @enderror>Jméno svěřence, název koletivu:</label>
                <input type="text" maxlength="150" name="team[6]" id="team6" value="{{ old('team.6') }}" class="form-control @error('team.6') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="success6" @error('success.6') class="red" @enderror>Uveďte dosažené sportovní úspěchy nominovaného za rok 2022:</label>
                <input type="text" maxlength="150" name="success[6]" id="success6" value="{{ old('success.6') }}" class="form-control @error('success.6') is-invalid @enderror">
            </div>
        </div>
    </section>
    <section class="group group6 clearfix">
        <div class="row">
            <div class="col-md-8">
                <h2>Trenér roku individuálních sportů</h2>
            </div>
            <div class="col-md-4 text-right radio @if(old('group.7') === "1") selected @endif">
                <label class="" for="group_7_1">v této kategorii nenominuji</label>
                <input type="radio" id="group_7_1" name="group[7]" value="1" class="form-check-inline" @if(old('group.7') === "1") checked @endif>
                <div></div>
            </div>
        </div>
        <div class="row form">
            <div class="col-md-4">
                <label for="fname7" @error('fname.7') class="red" @enderror>Jméno:</label>
                <input type="text" maxlength="150" name="fname[7]" id="fname7" value="{{ old('fname.7') }}" class="form-control @error('fname.7') is-invalid @enderror">
            </div>
            <div class="col-md-4">
                <label for="lname7" @error('lname.7') class="red" @enderror>Příjmení:</label>
                <input type="text" maxlength="150" name="lname[7]" id="lname7" value="{{ old('lname.7') }}" class="form-control @error('lname.7') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-4">
                <label for="membership7" @error('membership.7') class="red" @enderror>Členství v TJ/SK, sportovní odvětví:</label>
                <input type="text" maxlength="150" name="membership[7]" id="membership7" value="{{ old('membership.7') }}" class="form-control @error('membership.7') is-invalid @enderror">
            </div>
            <div class="col-md-4">
                <label for="team7" @error('team.7') class="red" @enderror>Jméno svěřence, název koletivu:</label>
                <input type="text" maxlength="150" name="team[7]" id="team7" value="{{ old('team.7') }}" class="form-control @error('team.7') is-invalid @enderror">
            </div>
        </div>
        <div class="row form">
            <div class="col-md-8">
                <label for="success7" @error('success.7') class="red" @enderror>Uveďte dosažené sportovní úspěchy nominovaného za rok 2022:</label>
                <input type="text" maxlength="150" name="success[7]" id="success7" value="{{ old('success.7') }}" class="form-control @error('success.7') is-invalid @enderror">
            </div>
        </div>
    </section>
    <section class="form">
        <h2>Odesílací formulář</h2>
        <div class="form-row">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                <label for="nfname" @error('nfname') class="red" @enderror>Jméno:</label>
                <input type="text" maxlength="150" class="form-control @error('nfname') is-invalid @enderror" id="nfname" name="nfname" value="{{ old('nfname') }}" required>
                <div class="invalid-feedback">
                    Vyplňte jméno!
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                <label for="nlname" @error('nlname') class="red" @enderror>Příjmení:</label>
                <input type="text" maxlength="150" class="form-control @error('nlname') is-invalid @enderror" id="nlname" name="nlname" value="{{ old('nlname') }}" required>
                <div class="invalid-feedback">
                    Vyplňte příjmení!
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <label for="nemail" @error('nemail') class="red" @enderror>E-mail:</label>
                <input type="email" maxlength="150" class="form-control @error('nemail') is-invalid @enderror" id="nemail" name="nemail" value="{{ old('nemail') }}" required>
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
            <p class="message text-center"><strong>Děkujeme za nominaci v anketě Sportovec roku 2022.</strong></p>
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
                    $(document).on('click', 'section.group .row .radio', function() {
                        let THIS = $(this);
                        if(THIS.hasClass('selected')) {
                            THIS.find('input:radio').prop('checked', false).attr('checked', false);
                            THIS.removeClass('selected');
                        } else {
                            THIS.find('input:radio').prop('checked', true).attr('checked', true);
                            THIS.addClass('selected');
                        }
                    });
                    $(document).on('click', 'section.group .row .radio label', function() {
                        let THIS = $(this);
                        if(THIS.parent().hasClass('selected')) {
                            THIS.parent().find('input:radio').prop('checked', false).attr('checked', false);
                            THIS.parent().removeClass('selected');
                        } else {
                            THIS.parent().find('input:radio').prop('checked', true).attr('checked', true);
                            THIS.parent().addClass('selected');
                        }
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
