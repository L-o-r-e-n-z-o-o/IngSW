// Wait for the DOM to be fully loaded
/*document.addEventListener('DOMContentLoaded', () => {
  const fileInput = document.getElementById('fileInput');
  const uploadButton = document.getElementById('uploadButton');

  uploadButton.addEventListener('click', async () => {
    // Check if a file has been selected
    if (fileInput.files.length === 0) {
      alert("Please select a file to upload.");
      return;
    }

    // Create a FormData object and append the selected file
    const formData = new FormData();
    formData.append('file', fileInput.files[0]);

    try {
      // Update the URL to the endpoint exposed by your Docker container
      const response = await fetch('http://localhost:8080/upload', {
        method: 'POST',
        body: formData
      });

      if (response.ok) {
        const result = await response.json();
        console.log("Upload successful:", result);
        alert("Upload successful!");
      } else {
        console.error("Upload failed:", response.statusText);
        alert("Upload failed. Server responded with: " + response.statusText);
      }
    } catch (error) {
      console.error("Error during file upload:", error);
      alert("An error occurred while uploading the file.");
    }
  });
});*/

