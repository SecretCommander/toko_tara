function charCountUpdate(str) {
    var lng = str.length;
    document.getElementById("charCount").innerHTML = lng + '/150';
  }
function charCountUpdate(str) {
    var lng = str.length;
    document.getElementById("charCounts").innerHTML = lng + '/2000';
  }

  function displayImage(input, previewId) {
    const file = input.files[0];
    const preview = document.getElementById(previewId);
    const fileName = document.getElementById(`file-name${previewId.slice(-1)}`);
  
    const reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
    };
  
    if (file) {
      reader.readAsDataURL(file);
      fileName.textContent = file.name;
    } else {
      preview.src = "#";
      fileName.textContent = "No file chosen";
    }
  }
  
  
  