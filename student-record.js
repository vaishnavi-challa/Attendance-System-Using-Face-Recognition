Promise.all([
  faceapi.nets.faceRecognitionNet.loadFromUri('./models'),
    faceapi.loadFaceRecognitionModel('./models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
    faceapi.nets.tinyFaceDetector.loadFromUri('./models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('./models'),
    faceapi.loadMtcnnModel('./models')
  ]).then(stsop);
var ajaxvar=[];
function stsop() {
  console.log('modelsloaded')
  const captureVideoButton = document.querySelector('#startw');
  const stopVideoButton = document.querySelector('#stopw');
  captureVideoButton.onclick = function(){
    start();
  };
  stopVideoButton.onclick = function() {
    const video = document.getElementById("videoInput");
    video.autoplay = false;
    navigator.mediaDevices.getUserMedia({
      video: true
    })
    .then(async stream =>{
      const tracks=stream.getTracks();
      video.srcObject.getVideoTracks().forEach((track) => track.stop());
      console.log(ajaxvar);

    })
    };
}
function record() {
  //   document.body.append("Models Loaded");
const video = document.getElementById("videoInput");
video.autoplay = true;
  navigator.getUserMedia(
    { video: {} },
    (stream) => (video.srcObject = stream),
    (err) => console.error(err)
  )

  console.log("video added");
  recognizeFaces();
}
async function recognizeFaces() {
  const labeledDescriptors = await loadLabeledImages();
  console.log(labeledDescriptors);
  const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.6);
const video = document.getElementById("videoInput");
  // video.addEventListener("play", async () => {
    const canvas = faceapi.createCanvasFromMedia(video);
    document.body.append(canvas);

    const displaySize = { width: video.width, height: video.height };
    faceapi.matchDimensions(canvas, displaySize);
    setInterval(async () => {
      const detections = await faceapi
        .detectAllFaces(video)
        .withFaceLandmarks()
        .withFaceDescriptors();
      const resizedDetections = faceapi.resizeResults(detections, displaySize);
      canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height-20);
      const results = resizedDetections.map((d) => {
        return faceMatcher.findBestMatch(d.descriptor,0.3);
      });

      results.forEach((result, i) => {
        const box = resizedDetections[i].detection.box;
        const drawBox = new faceapi.draw.DrawBox(box, {
          label: result.toString(),
        });
        if (!ajaxvar.includes(result['label']) && result['label']!='unknown')
        {
          ajaxvar.push(result['label'])
          $.ajax({
            type: "POST",
            url: "student-record.php",
            data: {
              jsvar: ajaxvar
            },
            success: function (data) {
              console.log(data);
            },
            error: function (data) {
              console.log(data);
            }
          });
        }
        drawBox.draw(canvas);
      },1);
    },10);
  // });
}
function loadLabeledImages() {
  const labels = ['el','max','will','vyshnavi','mike','vaishnavi','steve','nancy','uma','jonathon','hopper','joyce','lucus','dustin','robin']
  return Promise.all(
    labels.map(async (label) => {
      const descriptions = [];
      for (let i = 1; i <= 5; i++) {
        const img = await faceapi.fetchImage(`labeled_images/${label}/${i}.jpg`);
        const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor();
        descriptions.push(detections.descriptor);
      }
      return new faceapi.LabeledFaceDescriptors(label, descriptions);
    })
  );
}
  function start()
  {
    record();
  }
