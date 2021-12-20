import './style.css';
import _ from 'lodash';
import * as THREE from 'three';
var Mouse = {
  moving: false,
  movingForward: null,
  speed: 60,
  timeOfSmooth: 2000, // maxTimeOfSmooth

  wheelListener: function () {
      _this = this;
      _this.maxSpeed = _this.speed; // set maxSpeed
      document.addEventListener( 'mousewheel', onDocumentMouseWheel, false );
      function onDocumentMouseWheel (event) {
          _this.speed = _this.maxSpeed;
          _this.moving = true;

          if (event.wheelDeltaY >= 10) {
              _this.movingForward = true;
          } else {
              _this.movingForward = false;
          }

          clearTimeout(_this.timeOut);
          _this.timeOut = setTimeout(function () {
              _this.moving = false;
          }, _this.timeOfSmooth);
      }
  },

  smooth: function () {
      if (this.moving) {
          if (_this.movingForward) {
              Engine.camera.position.z -= _this.speed;
          } else {
              Engine.camera.position.z += _this.speed;
          }
      }
  },

  init: function () {
      this.wheelListener();
  }
};

const textureLoader = new THREE.TextureLoader();
const textureMoon = textureLoader.load("Texture/lroc_color_poles_2k.png"); 

const scene = new THREE.Scene();
scene.background = new THREE.Color( 0x121212 );
const camera = new THREE.PerspectiveCamera(90, window.innerWidth/window.innerHeight,0.1, 100);
const renderer = new THREE.WebGLRenderer({
  canvas: document.querySelector('#bg'),
  alpha: true,
});

var loader = new THREE.FontLoader();
loader.load( 'https://threejs.org/examples/fonts/helvetiker_regular.typeface.json', function ( font ) {
  var geometry = new THREE.TextGeometry( 'Hello Peeps!', {
    font: font,
    size: 0.5,
    height: 0.5,
    curveSegments: 4,
    bevelThickness: 0.02,
    bevelSize: 0.05,
    bevelSegments: 3,
  } );
  geometry.center();
  var material = new THREE.MeshStandardMaterial({
    color:0xC4F1F4,
    emissive:0xB2E685,
    emissiveIntensity:0.4,
  });
  var mesh = new THREE.Mesh( geometry, material );
  mesh.rotation.y = Math.PI / 2;
  mesh.position.set(-5,4,0);
  scene.add(mesh);
} );

renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth,window.innerHeight);
camera.position.set(0, 5, 0);
camera.lookAt(-20,0,0)


const geometry = new THREE.SphereGeometry(10, 64 , 64);
const material = new THREE.MeshStandardMaterial({
  map:textureMoon,
});

const Moon = new THREE.Mesh(geometry,material);
Moon.position.set(-20,0,0);
scene.add(Moon);

const pointLight = new THREE.PointLight(0xffffff, 0.3);
pointLight.position.set(-30,10,10);
const pointLight2 = new THREE.PointLight(0xffffff,0.3);
pointLight2.position.set(20,10,-20);
const pointLight3 = new THREE.PointLight(0xffffff,0.3);
pointLight3.position.set(20,10,0);
scene.add(pointLight,pointLight2,pointLight3);


const lightHelper = new THREE.PointLightHelper(pointLight);
const lightHelper2 = new THREE.PointLightHelper(pointLight2);
// const gridHelper = new THREE.GridHelper(50,50);
// scene.add(lightHelper,lightHelper2)

function addStar(){
  const geometry = new THREE.SphereGeometry(0.1,24,24);
  const material = new THREE.MeshStandardMaterial({color:0xffffff, emissive:0xffffff});
  const star = new THREE.Mesh(geometry,material);
  const [x,y,z] = Array(3).fill().map(() => THREE.MathUtils.randFloatSpread(100));
  star.position.set(x,y,z);
  scene.add(star);
  scene.add(pointLight);
}


Array(200).fill().forEach(addStar);


function animate(){
  requestAnimationFrame(animate);

  Moon.rotation.y += 0.001;
  renderer.render(scene,camera);
}

function panCamera(){
  const t = document.body.getBoundingClientRect().top;
  console.log(t)
    if (Mouse.moving && Mouse.speed > 0) {
      Mouse.speed -= Mouse.maxSpeed / 20;
      Mouse.smooth();
  }
  camera.position.x = t * -0.05;
  camera.position.y = 5 + t * -0.05;
  camera.lookAt(-20,0,0)
}

document.body.onscroll = panCamera;
animate();
