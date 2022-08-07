const imageUpload = document.getElementById("imageUpload");

Promise.all([
  faceapi.nets.faceRecognitionNet.loadFromUri(
    "/Attendance-System-Using-Face-Recognition/models"
  ),
  faceapi.nets.faceLandmark68Net.loadFromUri(
    "/Attendance-System-Using-Face-Recognition/models"
  ),
  faceapi.nets.ssdMobilenetv1.loadFromUri(
    "/Attendance-System-Using-Face-Recognition/models"
  ),
]).then(start);

async function start() {
  // const container = document.createElement('div')
  // container.style.position = 'relative'
  const container = document.getElementById("#images");

  // document.body.append(container)
  const labeledFaceDescriptors = await loadLabeledImages();
  const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6);
  let image;
  let canvas;
  document.body.append("Loaded");
  var phpvar = [];
  imageUpload.addEventListener("change", async () => {
    if (image) image.remove();
    if (canvas) canvas.remove();
    image = await faceapi.bufferToImage(imageUpload.files[0]);
    image.classList.add("mystyle");
    container.append(image);
    canvas = faceapi.createCanvasFromMedia(image);
    container.append(canvas);
    const displaySize = { width: 640, height: 530 };
    faceapi.matchDimensions(canvas, displaySize);
    const detections = await faceapi
      .detectAllFaces(image)
      .withFaceLandmarks()
      .withFaceDescriptors();
    const resizedDetections = faceapi.resizeResults(detections, displaySize);
    const results = resizedDetections.map((d) =>
      faceMatcher.findBestMatch(d.descriptor)
    );
    results.forEach((result, i) => {
      const box = resizedDetections[i].detection.box;
      const drawBox = new faceapi.draw.DrawBox(box, {
        label: result.toString(),
      });
      drawBox.draw(canvas);
      if (result["label"] != "unknown" && !phpvar.includes(result["label"])) {
        phpvar.push(result["label"]);
      }
    });

    $.ajax({
      type: "POST",
      url: "teacher-record.php",
      data: {
        selecting: phpvar,
      },
      success: function (data) {
        console.log(data);
      },
      error: function (data) {
        console.log("error");
      },
    });
  });
}

function loadLabeledImages() {
  const labels = [
    "el",
    "max",
    "will",
    "erica",
    "mike",
    "vaishnavi",
    "steve",
    "nancy",
    "belly",
    "jonathon",
    "hopper",
    "joyce",
    "lucus",
    "dustin",
    "robin",
  ];
  return Promise.all(
    labels.map(async (label) => {
      const descriptions = [];
      for (let i = 1; i <= 2; i++) {
        const img = await faceapi.fetchImage(
          `labeled_images/${label}/${i}.jpg`
        );

        // const img = await faceapi.fetchImage(`https://raw.githubusercontent.com/kasv-p/Face-Recognition-Attendance-System/main/labeled_images/${label}/${i}.jpg`)
        const detections = await faceapi
          .detectSingleFace(img)
          .withFaceLandmarks()
          .withFaceDescriptor();
        descriptions.push(detections.descriptor);
      }
      return new faceapi.LabeledFaceDescriptors(label, descriptions);
    })
  );
}
