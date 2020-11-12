<?php
    /*The number of slides will depend on the number of findings(n) + findings overall slide(m) + histogram slide + scope slide + title slide = 3 + n + m*/
    // with Composer
     require_once '../../vendor/autoload.php';

    use PhpOffice\PhpPresentation\PhpPresentation;
    use PhpOffice\PhpPresentation\IOFactory;
    use PhpOffice\PhpPresentation\Style\Color;
    use PhpOffice\PhpPresentation\Style\Alignment;

    //Colors used
    $colorBlack = new Color('FF000000');
    $colorDGray = new Color('FF090909');
    
    $mainFont = 'Arial';

    $alignCenter = Alignment::HORIZONTAL_CENTER;
    $alignLeft = Alignment::HORIZONTAL_LEFT;
    $alignRight = Alignment::HORIZONTAL_RIGHT;

    $objPHPPowerPoint = new PhpPresentation();

    function createERBreport($findingsArray){
        //Array with findings information

        //Slides Properties?
        $oMasterSlide = $objPHPPowerPoint->getAllMasterSlides()[0];
        $oSlideLayout = $oMasterSlide->getAllSlideLayouts()[0];

        //Create first slide
        $currentSlide = createSlide();

        //Adding little disclaimer in the upper/lower-center of the slide
        addDisclaimer($currentSlide, $alignCenter, $mainFont, $colorDGray);

        //MainTitle
        addText($currentSlide, 780, 115, 33, 250, $alignLeft, 'U.S. ARMY COMBAT CAPABILITIES DEVELOPMENT COMMAND —', false, $mainFont, 30, $colorBlack);

        //Additional title
        addText($currentSlide, 780, 80, 33, 350, $alignLeft, 'DATA & ANALYSIS CENTER', false, $mainFont, 30, $colorBlack);

        //CVPA title
        addText($currentSlide, 780, 80, 33, 460, $alignLeft, '[ CVPA Title ]', false, $mainFont, 20, $colorBlack);

        //Presenter info
        addText($currentSlide, 780, 30, 33, 565, $alignLeft, 'Name of Presenter', false, $mainFont, 12, $colorBlack);
        addText($currentSlide, 780, 30, 33, 595, $alignLeft, 'Rank/Title of Presenter (Ex. CISSP, CELH, Security+)', false, $mainFont, 12, $colorBlack);
        addText($currentSlide, 780, 30, 33, 627, $alignLeft, 'Cyber Experimentation & Analysis Division', false, $mainFont, 12, $colorBlack);

        //Adding today's date
        addText($currentSlide, 780, 30, 33, 682, $alignLeft, date("d m Y"), false, $mainFont, 8, $colorBlack);

        //Adding all images in first slide
        addImage($currentSlide, '../../view/images/army2.png', 'ARMY logo', 0, 170, 50, 50);
        addImage($currentSlide, '../../view/images/cead2.png', 'CEAD logo', 0, 120, 210, 60);
        addImage($currentSlide, '../../view/images/devcom.png', 'DEVCOM logo', 0, 105, 585, 60);

        //Add a new slide to the presentation
        $slide2 = $objPHPPowerPoint->createSlide();
        $slide2->setSlideLayout($oSlideLayout);

        //Adding little disclaimer in the upper/lower-center of the slide
        addDisclaimer($slide2, $alignCenter, $mainFont, $colorDGray);

        //Add small images
        addImage($slide2, '../../view/images/army2.png', 'ARMY logo', 0, 85, 30, 30);
        addImage($slide2, '../../view/images/cead2.png', 'CEAD logo', 0, 60, 120, 34);
        addImage($slide2, '../../view/images/devcom.png', 'DEVCOM logo', 0, 53, 768, 30);
    
        $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
        $oWriterPPTX->save("../../model/ERBreport/ERBreport.pptx");
    }

    function createSlide(){
        // Create slide
        $currentSlide = $objPHPPowerPoint->getActiveSlide();
        $currentSlide->setSlideLayout($oSlideLayout);

        return $currentSlide;
    }

    function addText($slide, $w, $h, $xOffset, $yOffset, $alignment, $text, $bold, $fontName, $fontSize, $fontColor){
        $textBox = $slide->createRichTextShape()
                            ->setWidth($w)
                            ->setHeight($h)
                            ->setOffsetX($xOffset)
                            ->setOffsetY($yOffset);
        $textBox->getActiveParagraph()->getAlignment()->setHorizontal($alignment);

        $textWriter = $textBox->createTextRun($text);
        $textWriter->getFont()->setBold($bold)
                                ->setSize($fontSize)
                                ->setName($fontName)
                                ->setColor($fontColor);
    }

    function addDisclaimer($currentSlide, $alignCenter, $mainFont, $colorDGray){
        //Adding little disclaimer in the upper/lower-center of the slide
        addText($currentSlide, 960, 0, 5, 10, $alignCenter, 'FOR OFFICIAL USE ONLY', true, $mainFont, 8, $colorDGray); 
    
        //Disclaimer on lower center
        addText($currentSlide, 960, 0, 5, 700, $alignCenter, 'FOR OFFICIAL USE ONLY', true, $mainFont, 8, $colorDGray);
    }

    function addImage($currentSlide, $path, $name, $w, $h, $xOffset, $yOffset){
        $armyLogo = $currentSlide->createDrawingShape();
        $armyLogo->setName($name)
                  ->setPath($path)
                  ->setHeight($h)
                  ->setOffsetX($xOffset)
                  ->setOffsetY($yOffset);
    }
/*
    //Adding little disclaimer in the upper/lower-center of the slide
    addDisclaimer($currentSlide, $alignCenter, $mainFont, $colorDGray);

    //MainTitle
    addText($currentSlide, 780, 115, 33, 250, $alignLeft, 'U.S. ARMY COMBAT CAPABILITIES DEVELOPMENT COMMAND —', false, $mainFont, 30, $colorBlack);

    //Additional title
    addText($currentSlide, 780, 80, 33, 350, $alignLeft, 'DATA & ANALYSIS CENTER', false, $mainFont, 30, $colorBlack);

    //CVPA title
    addText($currentSlide, 780, 80, 33, 460, $alignLeft, '[ CVPA Title ]', false, $mainFont, 20, $colorBlack);

    //Presenter info
    addText($currentSlide, 780, 30, 33, 565, $alignLeft, 'Name of Presenter', false, $mainFont, 12, $colorBlack);
    addText($currentSlide, 780, 30, 33, 595, $alignLeft, 'Rank/Title of Presenter (Ex. CISSP, CELH, Security+)', false, $mainFont, 12, $colorBlack);
    addText($currentSlide, 780, 30, 33, 627, $alignLeft, 'Cyber Experimentation & Analysis Division', false, $mainFont, 12, $colorBlack);

    //Adding today's date
    addText($currentSlide, 780, 30, 33, 682, $alignLeft, date("d m Y"), false, $mainFont, 8, $colorBlack);

    //Adding all images in first slide
    addImage($currentSlide, '../../view/images/army2.png', 'ARMY logo', 0, 170, 50, 50);
    addImage($currentSlide, '../../view/images/cead2.png', 'CEAD logo', 0, 120, 210, 60);
    addImage($currentSlide, '../../view/images/devcom.png', 'DEVCOM logo', 0, 105, 585, 60);

   
    //Add a new slide to the presentation
    $slide2 = $objPHPPowerPoint->createSlide();
    $slide2->setSlideLayout($oSlideLayout);

    //Adding little disclaimer in the upper/lower-center of the slide
    addDisclaimer($slide2, $alignCenter, $mainFont, $colorDGray);

    //Add small images
    addImage($slide2, '../../view/images/army2.png', 'ARMY logo', 0, 85, 30, 30);
    addImage($slide2, '../../view/images/cead2.png', 'CEAD logo', 0, 60, 120, 34);
    addImage($slide2, '../../view/images/devcom.png', 'DEVCOM logo', 0, 53, 768, 30);
    

    /*$shape1 = $currentSlide1->createRichTextShape()
                            ->setWidth(50);
    $shape1->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_LEFT );
    $textRun1 = $shape1->createTextRun('Thank you for using PHPPresentation!');
    $textRun1->getFont()->setBold(true)
                        ->setSize(12)
                        ->setColor( $colorBlack );
    // mkdir('../../model/ERBreport');
    $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
    $oWriterPPTX->save("../../model/ERBreport/ERBreport.pptx");*/
?>