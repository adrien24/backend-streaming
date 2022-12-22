<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

use FFMpeg\FFMpeg;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


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
        $pathToHelloWorldScript = $this->getParameter('kernel.project_dir'). '/src/assets/converter.sh';
        $process = new Process(['sh', $pathToHelloWorldScript]);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        // Cela affichera "Hello World"
        echo $process->getOutput();
        // ...
    }
}