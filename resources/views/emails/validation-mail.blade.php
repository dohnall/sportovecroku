<div style="text-align: center;">
    <p style="margin: 100px 0 100px 0;"><img src="{{ $message->embed(public_path().'/images/logo_sportovec_roku.png') }}" alt=""></p>
    <p style="font-family: arial, sans-serif; font-size: 24px; color: #003583;">Hlasovali jste v anketě Sportovec roku MČ Praha 15,<br>prosím potvrďte Vaše hlasování tlačítkem níže.</p>
    <p style="margin: 50px 0 50px 0; text-align: center;"><a href="{{ config('app.url') }}/{{ $data['hash'] }}"><img src="{{ $message->embed(public_path().'/images/button_potvrzeni.png') }}" alt=""></a></p>
    <hr style="border: 1px solid #dbdbdb; width: 1000px;">
    <p style="margin: 50px 0 50px 0;"><img src="{{ $message->embed(public_path().'/images/logo_mc_praha_15.png') }}" alt=""></p>
    <p style="font-family: arial, sans-serif; font-size: 16px; color: #003583;">Pořadatelem ankety Sportovec roku je MČ Praha 15.</p>
    <p style="font-family: arial, sans-serif; font-size: 16px; color: #003583;">Technickou část ankety Sportovec roku zajišťuje společnost MOO Design s.r.o.</p>
</div>
