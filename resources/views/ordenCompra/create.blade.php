@extends('layouts.master')
@section('title')
@lang('translation.create-product')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('build/css/style.css') }}">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Ecommerce
@endslot
@slot('title')
Crear nueva parametrizacion
@endslot
@endcomponent
<!DOCTYPE html>
<html>
<div class="container">
  <div class="title">Registrar nueva orden</div>
  <div class="content">
    <form action="#">
      <from>
        <div class="user-details">
          <from class="container2">
            <div class="select-btn">
              <span class="btn-text">Nombre del proveedor</span>
              <span class="arrow-dwn">
                <i class="fa-solid fa-chevron-down"></i>
              </span>
            </div>
            <ul class="list-items">
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">HTML & CSS</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">Bootstrap</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">JavaScript</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">Node.Js</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">React JS</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">Mango DB</span>
                </li>
            </ul>
            <script src="js/script.js"></script>
          </from>
          <ul class="list-items">
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">HTML & CSS</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">Bootstrap</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">JavaScript</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">Node.Js</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">React JS</span>
                </li>
                <li class="item">
                    <span class="checkbox">
                        <i class="fa-solid fa-check check-icon"></i>
                    </span>
                    <span class="item-text">Mango DB</span>
                </li>
            </ul>
          <from class="container2">
            <div class="select-btn">
              <span class="btn-text">Insumo</span>
              <span class="arrow-dwn">
                <i class="fa-solid fa-chevron-down"></i>
              </span>
            </div>
          </from>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
    </form>
  </div>
</div>

</html>


@endsection
@section('script')


<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>

<script>
  const selectBtn = document.querySelector(".select-btn"),
  items = document.querySelectorAll(".item");

  selectBtn.addEventListener("click", () => {
  selectBtn.classList.toggle("open");
  });

  items.forEach(item => {
  item.addEventListener("click", () => {
      item.classList.toggle("checked");

    let checked = document.querySelectorAll(".checked"),
        btnText = document.querySelector(".btn-text");

        if(checked && checked.length > 0){
            btnText.innerText = `${checked.length} Selected`;
        }else{
            btnText.innerText = "Select Language";
        }
  });
  })
</script>



@endsection