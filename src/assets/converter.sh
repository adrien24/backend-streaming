#!/usr/bin/env bash
$j=0;
for i in *.mp4;
  do name=`echo "$i" | cut -d'.' -f1`
  echo "$name"
  ffmpeg -i "$i" "${name}-COPY.mp4"
done