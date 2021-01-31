<?php

namespace App\DTO;

final class HeaderInformation
{
    private string $websiteName;

    private string $logo;

    private int $logoWidth;

    private string $backgroundColor;

    private string $textColor;

    public function __construct($websiteName, $logo, $logoWidth, $backgroundColor, $textColor)
    {
        $this->logoWidth = $logoWidth;
        $this->websiteName = $websiteName;
        $this->logo = $logo;
        $this->backgroundColor = $backgroundColor;
        $this->textColor = $textColor;
    }

    public function getWebsiteName(): string
    {
        return $this->websiteName;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function getLogoWidth(): int
    {
        return $this->logoWidth;
    }

    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    public function getTextColor(): string
    {
        return $this->textColor;
    }
}
