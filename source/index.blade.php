@extends('_layouts.master')

@section('body')
<h1 id="el">Hello @{{ name }}!</h1>
<form>
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
