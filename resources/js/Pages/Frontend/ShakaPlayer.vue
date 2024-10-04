<script setup>
import { onMounted } from 'vue';

function jumpTo(seconds) {
  const video = document.getElementById('video');
  video.currentTime = seconds;
}

onMounted(() => {
  // const manifestUri = '/resources/videos/ShakaPlayer.mp4';
  // const screenText = '/resources/videos/ShakaPlayer.vtt'; // 字幕檔案路徑
  const video = document.getElementById('video');
  const player = new shaka.Player(video);

  player.load(manifestUri).then(() => {
    player.addTextTrack(screenText, 'zh', 'subtitles', 'text/vtt').then(() => {
      const track = document.createElement('track');
      track.kind = 'subtitles';
      track.label = 'Chinese';
      track.srclang = 'zh';
      track.default = true;
      video.appendChild(track); // 動態加入track元素
    });
  });
});
</script>

<template><div>標題</div>
  <!-- controlsList='nodownload'禁止下載功能 -->
  <video id='video' width='620' poster='//shaka-player-demo.appspot.com/assets/poster.jpg' controls
    controlsList='nodownload' autoplay>
    <!-- 動態添加track，不在此定義 -->
    <track kind='captions' />
  </video>
  <!-- 原生跳轉 -->
  <div id='timeline-buttons'>
    <div>
      <button type='button' class='jump-button' @click='jumpTo(20)'>課程前導(0:20)</button>
    </div>
    <div>
      <button type='button' class='jump-button' @click='jumpTo(129)'>第二堂(2:09)</button>
    </div>
  </div>
</template>

<style>
  .jump-button {
    cursor: pointer;
    background-color: white;
    border: 0;
  }

  .jump-button:hover {
    color: blue;
  }
</style>
