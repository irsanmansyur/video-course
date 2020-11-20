const videoPlay = document.querySelector("#videoPlay");
let videos = document.querySelectorAll(".video-select");
[...videos].forEach(video => {
  video.addEventListener('click', e => {
    e.preventDefault();
    setVideoPlay(video);
  })
})

function setVideoPlay(video) {
  let CurrentVideo = document.querySelector(`#${videoPlay.dataset.current}`);
  CurrentVideo.dataset.start = videoPlay.currentTime;

  videoPlay.dataset.current = video.getAttribute("id");

  let src = video.dataset.url;
  videoPlay.querySelector("source").src = src;
  videoPlay.load();
  videoPlay.currentTime = parseFloat(video.dataset.start);
  videoPlay.play();
}