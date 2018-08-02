@extends('_layouts.master')

@section('body')
<h1 id="el">Hello @{{ name }}!</h1>
<form method="post" name="contact" action="/thank-you" netlify netlify-honypot="bot-field">
  <input type="hidden" name="form-name" value="contact">
  <p style="display:none">
    <label>Dont fill this out: <input name="bot-field"></label>
  </p>
  <label for="name">Name</label>
  <input type="text" id="name" name="name">
  <div id="number">
    @verbatim
      <span @click="show">{{ showHideMessage }}</span>
      <div v-if="visible">
        <label for="number">number</label>
        <input type="number" name="number">
      </div>
    @endverbatim
  </div>
  <input class="button" type="submit" value="Send Message" />
</form>
@endsection

@section('scripts')
  <script>
    new Vue({
      data: {
        name: 'Person'
      },
    }).$mount('#el');
    new Vue({
      data: {
        visible: false,
        showHideMessage: 'Show'
      },
      methods: {
        show: function () {
          if (this.visible == false) {
            this.visible = true
            this.showHideMessage = 'Hide'
          } else {
            this.visible = false
            this.showHideMessage = 'Show'
          }
        }
      }
    }).$mount('#number')
  </script>
@endsection
