
<?php
    /*The number of slides will depend on the number of findings(n) + findings overall slide(m) + histogram slide + scope slide + title slide = 3 + n + m*/
    // with Composer
    require_once ('../../vendor/autoload.php');

    use PhpOffice\PhpPresentation\PhpPresentation;
    use PhpOffice\PhpPresentation\IOFactory;
    use PhpOffice\PhpPresentation\Style\Color;
    use PhpOffice\PhpPresentation\Style\Alignment;
    use PhpOffice\PhpPresentation\Style\Bullet;
    use PhpOffice\PhpPresentation\Style\Fill;

    const HOR_CENTER = 480;
    const VER_CENTER = 360;

    function createERB($findingArray, $systemArray){
        //Colors used

        $mainFont = 'Arial';

        $alignCenter = Alignment::HORIZONTAL_CENTER;
        $alignLeft = Alignment::HORIZONTAL_LEFT;
        $alignRight = Alignment::HORIZONTAL_RIGHT;

        $objPHPPowerPoint = new PhpPresentation();

        //Slides Properties?
        $oMasterSlide = $objPHPPowerPoint->getAllMasterSlides()[0];
        $oSlideLayout = $oMasterSlide->getAllSlideLayouts()[0];

        // Create slide
        $currentSlide = $objPHPPowerPoint->getActiveSlide();
        $currentSlide->setSlideLayout($oSlideLayout);


        //Adding little disclaimer in the upper/lower-center of the slide
        addDisclaimer($currentSlide, $alignCenter, $mainFont);

        //MainTitle
        addText($currentSlide, 780, 115, 33, 250, $alignLeft, 'U.S. ARMY COMBAT CAPABILITIES DEVELOPMENT COMMAND —', false, $mainFont, 30);

        //Additional title
        addText($currentSlide, 780, 80, 33, 350, $alignLeft, 'DATA & ANALYSIS CENTER', false, $mainFont, 30);

        //CVPA title
        addText($currentSlide, 780, 80, 33, 460, $alignLeft, '[ CVPA Title ]', false, $mainFont, 20);

        //Presenter info
        addText($currentSlide, 780, 30, 33, 565, $alignLeft, 'Name of Presenter', false, $mainFont, 12);
        addText($currentSlide, 780, 30, 33, 595, $alignLeft, 'Rank/Title of Presenter (Ex. CISSP, CELH, Security+)', false, $mainFont, 12);
        addText($currentSlide, 780, 30, 33, 627, $alignLeft, 'Cyber Experimentation & Analysis Division', false, $mainFont, 12);

        //Adding today's date
        addText($currentSlide, 780, 30, 33, 682, $alignLeft, date("d m Y"), false, $mainFont, 8);

        //Adding all images in first slide
        addImage($currentSlide, '../../view/images/army2.png', 'ARMY logo', 0, 170, 50, 50);
        addImage($currentSlide, '../../view/images/cead2.png', 'CEAD logo', 0, 120, 210, 60);
        addImage($currentSlide, '../../view/images/devcom.png', 'DEVCOM logo', 0, 105, 585, 60);

        #SLIDE 2
        //Add a new slide to the presentation
        $slide2 = $objPHPPowerPoint->createSlide();
        $slide2->setSlideLayout($oSlideLayout);

        //Adding little disclaimer in the upper/lower-center of the slide
        addDisclaimer($slide2, $alignCenter, $mainFont);

        //Add small images
        addImage($slide2, '../../view/images/army2.png', 'ARMY logo', 0, 85, 30, 30);
        addImage($slide2, '../../view/images/cead2.png', 'CEAD logo', 0, 60, 120, 34);
        addImage($slide2, '../../view/images/devcom.png', 'DEVCOM logo', 0, 53, 768, 30);

        //Adding SCOPE title
        addText($slide2, 624, 53, 170, 35, $alignLeft, 'SCOPE', true, $mainFont, 20);

        //Adding little instruction
        addBullet($slide2, 850, 496, 48, 130, $alignLeft, 'Systems accessed during the CVPA are as follow:', true, $mainFont, 18, '•');

        //Loop where system names will be displayed
        for($i = 0, $y = 160; $i < count($systemArray); $i++){
            addBullet($slide2, 600, 50, 80, $y, $alignLeft, $systemArray[$i], false, $mainFont, 16, '— ');
            $y += 25;
        }

        
        #SLIDE 3
        //Adding a new slide
        $slide3 = $objPHPPowerPoint->createSlide();
        $slide3->setSlideLayout($oSlideLayout);

        //Adding little disclaimer in the upper/lower-center of the slide
        addDisclaimer($slide3, $alignCenter, $mainFont);

        //Add small images
        addImage($slide3, '../../view/images/army2.png', 'ARMY logo', 0, 80, 25, 27);
        addImage($slide3, '../../view/images/cead2.png', 'CEAD logo', 0, 55, 96, 30);
        addImage($slide3, '../../view/images/devcom.png', 'DEVCOM logo', 0, 43, 805, 35);
        
        //Adding FINDINGS title
        addText($slide3, 624, 53, 170, 35, $alignLeft, 'FINDINGS', true, $mainFont, 20);

        $findingsTable = $slide3->createTableShape(5);
        $findingsTable->setHeight(600);
        $findingsTable->setWidth(900);
        $findingsTable->setOffsetX(32);
        $findingsTable->setOffsetY(117);
 
        // Add row
        //Dark green, accent 1
        $headersRow = $findingsTable->createRow();
        addTableHeaders($headersRow, "ID");
        addTableHeaders($headersRow, "System");
        addTableHeaders($headersRow, "Finding");
        addTableHeaders($headersRow, "Impact");
        addTableHeaders($headersRow, "Risk");

        //Loop to add all the findings' information
        for($i = 0; $i < count($findingArray); $i+=1){
            addRow($findingsTable, $findingArray[$i], ($i+1));    
        }

        //Saving the presentation
        $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
        $oWriterPPTX->save("../../model/ERBreport/ERBreport.pptx");
        echo "<meta http-equiv='refresh' content='0;url=../../model/ERBreport/ERBreport.pptx'/>";
    }

    function addText($slide, $w, $h, $xOffset, $yOffset, $alignment, $text, $bold, $fontName, $fontSize){
        $textBox = $slide->createRichTextShape()
                         ->setWidth($w)
                         ->setHeight($h)
                         ->setOffsetX($xOffset)
                         ->setOffsetY($yOffset);
        $textBox->getActiveParagraph()->getAlignment()->setHorizontal($alignment);

        $textWriter = $textBox->createTextRun($text);
        $textWriter->getFont()->setBold($bold)
                              ->setSize($fontSize)
                              ->setName($fontName);
    }

    function addBullet($slide, $w, $h, $xOffset, $yOffset, $alignment, $text, $bold, $fontName, $fontSize, $bullChar){
        $textBox = $slide->createRichTextShape()
                         ->setWidth($w)
                         ->setHeight($h)
                         ->setOffsetX($xOffset)
                         ->setOffsetY($yOffset);
        $textBox->getActiveParagraph()
                ->getAlignment()
                ->setHorizontal($alignment);
        $textBox->getActiveParagraph()
                ->getBulletStyle()
                ->setBulletType(Bullet::TYPE_BULLET)
                ->setBulletChar($bullChar);

        $textWriter = $textBox->createTextRun($text);
        $textWriter->getFont()->setBold($bold)
                              ->setSize($fontSize)
                              ->setName($fontName);
    }

    function addDisclaimer($currentSlide, $alignCenter, $mainFont){
        //Adding little disclaimer in the upper/lower-center of the slide
        addText($currentSlide, 960, 0, 5, 10, $alignCenter, 'FOR OFFICIAL USE ONLY', true, $mainFont, 8); 
    
        //Disclaimer on lower center
        addText($currentSlide, 960, 0, 5, 700, $alignCenter, 'FOR OFFICIAL USE ONLY', true, $mainFont, 8);
    }

    function addImage($currentSlide, $path, $name, $w, $h, $xOffset, $yOffset){
        $armyLogo = $currentSlide->createDrawingShape();
        $armyLogo->setName($name)
                  ->setPath($path)
                  ->setHeight($h)
                  ->setOffsetX($xOffset)
                  ->setOffsetY($yOffset);
    }

    function addTableHeaders($header, $title){
        $a1 = $header->nextCell();

        //Setting text
        $a1->createTextRun($title)->getFont()->setBold(true)->setSize(18)->setColor(new Color('FFFFFFFF'))->setName('Arial (Body)');
        
        //Setting cell fill color
        $a1->getFill()->setFillType(Fill::FILL_SOLID);
        $a1->getFill()->setStartColor(new Color('FF333C33'));

        //Setting text alignment
        $a1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        $a1->setSidesColor(new Color(Color::COLOR_WHITE));
    }

    function addRow($table, $finding, $num){
        $lightGray = new Color('FFE8E8E8');
        $darkGray = new Color('FFCDCECD');
        $rowColor = null;;

        //Create a brand-new table row
        $newRow = $table->createRow();

        //select the appropriate cell
        if(($num-1) % 2 == 0){
            $rowColor = $darkGray;
        } else{
            $rowColor = $lightGray;
        }

        //Setting the ID number for a finding, not the same as MongoDB ID
        addCell($newRow, $num, 18, false, 'Arial (Body)', $rowColor);

        if(empty($finding->associatedSystem)){
            $associatedSystem = "No System Association";
        } else{
            $associatedSystem = $finding[1];
        }

        /*Adding: 
        1. Related System
        2. Finding Title
        3. Impact (not initials)
        4. Risk (not initials)
        */
        addCell($newRow, $associatedSystem, 18, false, 'Arial (Body)', $rowColor);
        addCell($newRow, $finding[2], 18, false, 'Arial (Body)', $rowColor);
        addCell($newRow, $finding[3], 11, true, 'Times New Roman', $rowColor);
        addCell($newRow, $finding[4], 11, true, 'Times New Roman', $rowColor);
    }

    function addCell($row, $text, $fontSize, $isBold, $fontType, $fillColor){
        $cell = $row->nextCell();

        //Setting border's color white
        $cell->setSidesColor(new Color(Color::COLOR_WHITE));

        //Setting text
        if(strlen($text) < 3 && !(is_numeric($text)))
            $cell->createTextRun(translateInitials($text))->getFont()->setBold($isBold)->setSize($fontSize)->setName($fontType);
        else
            $cell->createTextRun($text)->getFont()->setBold($isBold)->setSize($fontSize)->setName($fontType);
        $cell->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        $cell->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor($fillColor);
    }

    //This function translates the initials for both the impact and the risk
    function translateInitials($letters){
        switch ($letters){
            case "VL":
                return "Very Low";
            case "L":
                return "Low";
            case "M":
                return "Moderate";
            case "H":
                return "High";
            case "VH":
                return "Very High";
            default:
                return "Info";
        }
    }
?>