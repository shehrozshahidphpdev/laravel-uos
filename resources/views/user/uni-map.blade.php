@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Vc-Message
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Map
" />
    <section class="map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3431.3101458141837!2d73.0875963738858!3d30.68154872681457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb5f17e730625a55!2sUniversity+of+Sahiwal!5e0!3m2!1sen!2s!4v1540636333726"
        width="100%" height="400" frameborder="0px" style="border:0; margin:0px 0px" allowfullscreen=""></iframe>
    </section>
  </main>
</x-user.layouts.master>