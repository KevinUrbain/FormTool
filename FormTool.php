<?php
declare(strict_types=1);

class FormTool
{

    public function __construct(private string $targetUrl, private array $fields = [])
    {

    }

    public function render()
    {
        echo "<div style='border: 1px solid #ccc; padding: 20px; font-family: sans-serif; max-width: 400px;'>";
        echo "<h3>Test rapide : {$this->targetUrl}</h3>";
        echo "<form action='{$this->targetUrl}' method='POST'>";

        foreach ($this->fields as $field) {
            echo "<label style='display:block; margin-top:10px;'><b>{$field['name']}</b></label>";
            echo "<input type='{$field['type']}' name='{$field['name']}' value='{$field['value']}' style='width: 100%; padding: 5px;' required>";
        }

        echo "<button type='submit' style='margin-top: 15px; padding: 10px; width: 100%; cursor: pointer;'>Envoyer le test</button>";
        echo "</form>";
        echo "</div>";
    }

    public function addField(string $name, string $type = 'text'): void
    {
        $this->fields[] = [
            'name' => $name,
            'type' => $type,
            'value' => $this->generateDummyData($type)
        ];
    }

    private function generateDummyData(string $type): string
    {
        return match ($type) {
            'email' => 'user' . rand(1, 999) . '@test.com',
            'number' => (string) rand(10, 500),
            'date' => date('Y-m-d'),
            'password' => 'MotDePasse123!',
            default => 'Test ' . uniqid()
        };
    }
}


//Exemple d'utilisation
$formulaire = new FormTool('traitement_crud.php');
$formulaire->addField('email_utilisateur', 'email');
$formulaire->addField('mot_de_passe', 'password');
$formulaire->render();