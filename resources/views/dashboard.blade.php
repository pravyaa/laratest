<style type="text/css">
    <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($partners as $partner)
        <div class="col-md-4">
        <div class="card">
          <img src="{{ asset($partner->profile_image) }}" alt="" style="width:100%">
          <h1>{{ $partner->name . ' ' . $partner->last_name  }}</h1>
          <p class="title">{{ $partner->date_of_birth }}</p>
          <p class="title">{{ $partner->annual_income }} Lakh</p>
          
</div>
</div>
@endforeach
        </div>
    </div>
</x-app-layout>
