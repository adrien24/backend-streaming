#!/usr/bin/env bash

for i in *.mkv;
do (ffmpeg-bar -i "$i" -c:v libx264 -preset slow -crf 22 -vf subtitles="$i" "${i%.*}.mp4";
rm "$i"
);
done
