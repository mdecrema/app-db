@extends('layouts.app')

@section('page-title')
    All Equipment Rented
@endsection

@section('content')
<ul style="list-style: none">
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.skiRent.allEquipment') }}">Tutto il materiale</a></li>
    <li style="display: inline-block; padding: 0 5px"><a href="{{ route('admin.skiRent.addEquipment') }}">Aggiungi materiale</a></li>
</ul>
<h2>Attrezzatura noleggiata</h2>
<!-- bar code-->
<div style="width: 150px; height: 30px; padding: 0 5px; background-color: #15AABF; border-radius: 30px; line-height: 30px; cursor: pointer">
    <div style="width: 20px; height: 20px; border-radius: 100%; text-align: center; background-color: #fff; line-height: 20px; display: inline-block">
        <i class="fas fa-mobile-alt" style="color: #15AABF"></i>
    </div>
    <span style="color: #fff; padding: 0 2px; display: inline-block">SCAN BAR CODE</span>
</div>

@if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

<div class="row" style="margin: 30px 0">
    @foreach($allRent as $item)
        <div style="padding: 10px 20px; margin: 5px 0; border: 1px solid lightgrey; list-style: none; cursor: pointer; position: relative">
            <h4>{{ $item->ski_id }}</h4>
            <h5>{{ date("d-m-Y", ($item->date / 1000))  }}</h5>
            <a href="deleteRent/{{$item['id']}}" style="width: 30px; height: 50%; position: absolute; top: 0; right: 0; text-align: right; padding: 5px 10px;">
                <i class="far fa-times-circle"></i>
            </a>
        </div>
    @endforeach
    </ul>
</div>


<div class="display-cover">
    <video autoplay></video>
    <canvas class="d-none"></canvas>

    <div class="video-options">
        <select name="" id="" class="custom-select">
            <option value="">Select camera</option>
        </select>
    </div>

    <img class="screenshot-image d-none" alt="">

    <div class="controls">
        <button class="btn btn-danger play" title="Play"><i data-feather="play-circle"></i></button>
        <button class="btn btn-info pause d-none" title="Pause"><i data-feather="pause"></i></button>
        <button class="btn btn-outline-success screenshot d-none" title="ScreenShot"><i data-feather="image"></i></button>
    </div>
</div>

<script src="https://unpkg.com/feather-icons"></script>
<script src="script.js"></script>
<script>
    feather.replace();

const controls = document.querySelector('.controls');
const cameraOptions = document.querySelector('.video-options>select');
const video = document.querySelector('video');
const canvas = document.querySelector('canvas');
const screenshotImage = document.querySelector('img');
const buttons = [...controls.querySelectorAll('button')];
let streamStarted = false;

const [play, pause, screenshot] = buttons;

const constraints = {
  video: {
    width: {
      min: 1280,
      ideal: 1920,
      max: 2560,
    },
    height: {
      min: 720,
      ideal: 1080,
      max: 1440
    },
  }
};

const getCameraSelection = async () => {
  const devices = await navigator.mediaDevices.enumerateDevices();
  const videoDevices = devices.filter(device => device.kind === 'videoinput');
  const options = videoDevices.map(videoDevice => {
    return `<option value="${videoDevice.deviceId}">${videoDevice.label}</option>`;
  });
  cameraOptions.innerHTML = options.join('');
};

play.onclick = () => {
  if (streamStarted) {
    video.play();
    play.classList.add('d-none');
    pause.classList.remove('d-none');
    return;
  }
  if ('mediaDevices' in navigator && navigator.mediaDevices.getUserMedia) {
    const updatedConstraints = {
      ...constraints,
      deviceId: {
        exact: cameraOptions.value
      }
    };
    startStream(updatedConstraints);
  }
};

const startStream = async (constraints) => {
  const stream = await navigator.mediaDevices.getUserMedia(constraints);
  handleStream(stream);
};

const handleStream = (stream) => {
  video.srcObject = stream;
  play.classList.add('d-none');
  pause.classList.remove('d-none');
  screenshot.classList.remove('d-none');
  streamStarted = true;
};

getCameraSelection();

cameraOptions.onchange = () => {
  const updatedConstraints = {
    ...constraints,
    deviceId: {
      exact: cameraOptions.value
    }
  };
  startStream(updatedConstraints);
};

const pauseStream = () => {
  video.pause();
  play.classList.remove('d-none');
  pause.classList.add('d-none');
};

const doScreenshot = () => {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0);
  screenshotImage.src = canvas.toDataURL('image/webp');
  screenshotImage.classList.remove('d-none');
};

pause.onclick = pauseStream;
screenshot.onclick = doScreenshot;
</script>

@endsection