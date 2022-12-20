<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

// Use the FFMpeg tool
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;


class convert extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // FFmpeg options
        $ffmpeg = FFMpeg::create(
            array(
                'timeout' => 0, // The timeout for the underlying process
            )
        );
        // Path of the directory
        $video = $this->getParameter('kernel.project_dir'). '/src/assets/needConvert';
        // File of the video
        $videoD = $ffmpeg->open($video. '/Jujutsu.mkv');
        // Format video encode
        $format = new X264();
        // Format audio encode
        $format->setAudioCodec("libmp3lame");
        // Target save video directory
        $videoD->save($format, $video . '/Jujutsu.mp4');


        return new Response("webm video succesfully converted to mp4");
    }
}