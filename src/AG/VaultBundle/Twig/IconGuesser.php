<?php


namespace AG\VaultBundle\Twig;


class IconGuesser extends \Twig_Extension
{
    var $mimeTypeToIcon = array();

    /**
     * IconGuesser constructor.
     */
    public function __construct()
    {
        $this->mimeTypeToIcon = array(
            'application/pdf'                                                               => 'file-pdf-o',
            'application/x-pdf'                                                             => 'file-pdf-o',
            'application/x-compressed'                                                      => 'file-archive-o',
            'application/x-zip-compressed'                                                  => 'file-archive-o',
            'application/x-rar-compressed'                                                  => 'file-archive-o',
            'application/x-7z-compressed'                                                   => 'file-archive-o',
            'application/zip'                                                               => 'file-archive-o',
            'multipart/x-zip'                                                               => 'file-archive-o',
            'image/jpeg'                                                                    => 'file-image-o',
            'image/png'                                                                     => 'file-image-o',
            'image/bmp'                                                                     => 'file-image-o',
            'image/gif'                                                                     => 'file-image-o',
            'video/mpeg'                                                                    => 'file-video-o',
            'video/mp4'                                                                     => 'file-video-o',
            'video/quicktime'                                                               => 'file-video-o',
            'video/x-ms-wmv'                                                                => 'file-video-o',
            'video/x-msvideo'                                                               => 'file-video-o',
            'video/x-flv'                                                                   => 'file-video-o',
            'video/webm'                                                                    => 'file-video-o',
            'video/x-matroska'                                                              => 'file-video-o',
            'audio/mp3'                                                                     => 'file-audio-o',
            'audio/mpeg'                                                                    => 'file-audio-o',
            'audio/x-ms-wma'                                                                => 'file-audio-o',
            'audio/x-wav'                                                                   => 'file-audio-o',
            'application/mspowerpoint'                                                      => 'file-powerpoint-o',
            'application/vnd.ms-powerpoint'                                                 => 'file-powerpoint-o',
            'application/x-mspowerpoint'                                                    => 'file-powerpoint-o',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation'     => 'file-powerpoint-o',
            'application/vnd.openxmlformats-officedocument.presentationml.slide'            => 'file-powerpoint-o',
            'application/vnd.openxmlformats-officedocument.presentationml.slideshow'        => 'file-powerpoint-o',
            'application/vnd.openxmlformats-officedocument.presentationml.template'         => 'file-powerpoint-o',
            'application/vnd.oasis.opendocument.presentation'                               => 'file-powerpoint-o',
            'application/vnd.oasis.opendocument.presentation-template'                      => 'file-powerpoint-o',
            'application/vnd.oasis.opendocument.spreadsheet'                                => 'file-powerpoint-o',
            'application/vnd.oasis.opendocument.spreadsheet-template'                       => 'file-powerpoint-o',
            'application/vnd.ms-excel'                                                      => 'file-excel-o',
            'application/vnd.ms-excel.addin.macroenabled.12'                                => 'file-excel-o',
            'application/vnd.ms-excel.sheet.binary.macroenabled.12'                         => 'file-excel-o',
            'application/vnd.ms-excel.template.macroenabled.12'                             => 'file-excel-o',
            'application/vnd.ms-excel.sheet.macroenabled.12'                                => 'file-excel-o',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'             => 'file-excel-o',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.template'          => 'file-excel-o',
            'application/vnd.oasis.opendocument.text'                                       => 'file-text-o',
            'application/vnd.oasis.opendocument.text-master'                                => 'file-text-o',
            'application/vnd.oasis.opendocument.text-template'                              => 'file-text-o',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'       => 'file-text-o',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.template'       => 'file-text-o',
            'application/msword'                                                            => 'file-text-o',
            'text/plain'                                                                    => 'file-text-o',
            'text/html'                                                                     => 'file-code-o',
            'text/css'                                                                      => 'file-code-o',
            'application/javascript'                                                        => 'file-code-o',
            'application/json'                                                              => 'file-code-o'
        );
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('icon_guesser', array(
                $this,
                'iconGuesser'
            ), array(
                'is_safe' => array(
                    'html'
                )
            ))
        );
    }

    public function iconGuesser($mimeType)
    {
        return array_key_exists($mimeType, $this->mimeTypeToIcon) ? $this->mimeTypeToIcon[$mimeType] : 'file-o';
    }

    public function getName()
    {
        return 'icon_guesser';
    }
}