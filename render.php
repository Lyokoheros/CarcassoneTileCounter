<?php

    class Render
    {
        protected $DefaultLanguage = 'Pl';
        protected $Titles = ['Pl' => "Carcassone - licznik płytek", 'Eng'=> 'Carcassone - tile counter'];
        protected $Expansions = ["BaseGame", "Kupcy i budowniczowie", "Karczmy i Katedry"];
        protected $TableHeaders = [
            'Tile' => ['Pl' => 'Płytka', 'Eng' => 'Tile'],
            'Used number' => ['Pl' => 'Wykorzystanych', 'Eng'=> 'Used'],
            'Total number' => ['Pl' => 'Wszystkich', 'Eng'=> 'All'],
            'Actions' => ['Pl' => 'Akcje', 'Eng'=> 'Actions']

        ];
        protected $Buttons = [
            'Use' => ['Pl' => 'Użyj', 'Eng' => 'Use'],
            'Undo' => ['Pl' => 'Cofnij', 'Eng'=> 'Undo']
        ];

        public function init()
        {
            return true;
        }
        public function Header($language=Null, $title = Null)
        {
            $language = (is_null($language)) ? $this->DefaultLanguage : $language;
            //echo $language;
            //echo $title;
            $title = (is_null($title)) ? $this->Titles[$language] : $title;
            

            Echo <<<HEADER
            <!doctype html lang="$language">
            <html>
            <head>
                <title>$title</title>
                <meta charset="utf-8">
                <meta name="author" content="Lyokoheros(Maciej Tomaszyk)">
            
                <link rel="stylesheet" type="text/css" href="style.css" title="CSS-Styles">
            </head>
            HEADER;
        }
        public function Body($content)
        {
            Echo <<<BODY
            <body>
                $content
            </body>
            </html>
            BODY;

        }

        public function Div($content, $class=NULL, $id=NULL)
        {
            $element = '<div';
            if(isset($class))
            {
                $element = $element." class=\"$class\"";
            }
            if(isset($id))
            {
                $element = $element." id=\"$id\"";
            }
            $element = $element.">$content</div>";

            return $element;
        }


        public function ExpansionSelection($expansions)
        {
            $selectedExpansions=[];

            $content =  '<form action=\'game.php\' method=\'post\' id=\'gameform\'>'
                        
                        .'<label for=\'selectedExpansions[]\'>Select expansions:</label>'
                        .'<select multiple=\'multiple\' name=\'selectedExpansions[] form=\'gameform\'>';
            foreach($expansions as $expansion)
            {
                $content = $content."<option value=\"$expansion\">$expansion</option>";
            }
            $content = $content.'</select><br>'
            
            .'<input type=\'submit\' value=\'wyślij\'>'
            .'</form>';

            return $content;
        }


        public function GameTable($language = Null)
        {
            $language = (is_null($language)) ? $this->DefaultLanguage : $language;
            
            $tile = $this->TableHeaders['Tile'][$language];
            $used = $this->TableHeaders['Used number'][$language];
            $total = $this->TableHeaders['Total number'][$language];
            $actions = $this->TableHeaders['Actions'][$language];
            $use = $this->Buttons['Use'][$language];
            $undo = $this->Buttons['Undo'][$language];
            echo <<<TABLE


            <table  class="table">
            <tr>
                <th>$tile</th>
                <th>$used</th>
                <th>$total</th>
                <th>$actions</th>

            </tr>
            TABLE;
            echo <<<TABLE
            <tr>
                <td class="table-text">placeholder</th>
                <td class="table-text">1</th>
                <td class="table-text">3</th>
                <td class="table-text"><button>$use</button><button>$undo</button></th>
            </tr>
            TABLE;
            echo "</table>";
            //var_dump($this->TableHeaders);

        }
        

                 

        public function StartPage($language=Null, $title = Null)
        {             
            $language = (is_null($language)) ? $this->DefaultLanguage : $language;
            // echo $language;
            $title = (is_null($title)) ? $this->Titles[$language] : $title;
            // echo $title;

            $this->Header($title=$title);
            
            $content =  $this->Div($title, $class="titles");
            $content =  $content.$this->ExpansionSelection($this->Expansions);
            $this->Body($content);       

        }

        public function GamePage($language = Null, $title = Null)
        {             
            $language = (is_null($language)) ? $this->DefaultLanguage : $language;
            // echo $language;
            $title = (is_null($title)) ? $this->Titles[$language] : $title;
            // echo $title;

            $this->Header(); //$title=$title

            $content =  $this->Div($title, $class="titles");
            $content =  $content.$this->GameTable();
            //$this->Body($content);
        }


    }
?>