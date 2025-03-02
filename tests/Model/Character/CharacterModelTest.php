<?php

namespace App\Tests\Model\Character;

use App\Model\Character\CharacterModel;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CharacterModelTest extends KernelTestCase
{

    private ?SerializerInterface $serializer = null;

    private ?string $directory = null;

    final public function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->serializer = $container->get('jms_serializer');
        $this->directory = __DIR__ . '/fixtures/' . $this->name() . '/';
    }

    #[DataProvider('provideTestCharacterModelSerializeData')]
    final public function testCharacterModelSerialize(string $fileName): void
    {
        $fileContent = file_get_contents($this->directory . $fileName);
        $model = $this->serializer->deserialize($fileContent, CharacterModel::class, 'xml');
        $content = $this->serializer->serialize($model, 'xml');

        $this->assertXmlStringEqualsXmlString($fileContent, $content);
    }

    final public static function provideTestCharacterModelSerializeData(): array
    {
        return [
            '1 level no data 3d6 all sources restrict playtest' => ['1 level no data 3d6 all sources restrict playtest.dnd5e'],
            '1 level no data 3d6 all sources' => ['1 level no data 3d6 all sources.dnd5e'],
            '1 level no data 3d6 srd race subrace class background trait' => ['1 level no data 3d6 srd race subrace class background trait.dnd5e'],
            '1 level no data 3d6 srd race subrace class background traits ideal bond flaw languages proficiencies' => ['1 level no data 3d6 srd race subrace class background traits ideal bond flaw languages proficiencies.dnd5e'],
            '1 level no data 3d6 srd race subrace class background traits ideal bond flaw languages' => ['1 level no data 3d6 srd race subrace class background traits ideal bond flaw languages.dnd5e'],
            '1 level no data 3d6 srd race subrace class background traits ideal bond flaw' => ['1 level no data 3d6 srd race subrace class background traits ideal bond flaw.dnd5e'],
            '1 level no data 3d6 srd race subrace class background traits ideal bond' => ['1 level no data 3d6 srd race subrace class background traits ideal bond.dnd5e'],
            '1 level no data 3d6 srd race subrace class background traits ideal' => ['1 level no data 3d6 srd race subrace class background traits ideal.dnd5e'],
            '1 level no data 3d6 srd race subrace class background traits' => ['1 level no data 3d6 srd race subrace class background traits.dnd5e'],
            '1 level no data 3d6 srd race subrace class background' => ['1 level no data 3d6 srd race subrace class background.dnd5e'],
            '1 level no data 3d6 srd race subrace class' => ['1 level no data 3d6 srd race subrace class.dnd5e'],
            '1 level no data 3d6 srd race subrace' => ['1 level no data 3d6 srd race subrace.dnd5e'],
            '1 level no data 3d6 srd race' => ['1 level no data 3d6 srd race.dnd5e'],
            '1 level no data 3d6 srd' => ['1 level no data 3d6 srd.dnd5e'],
            '1 level no data 3d6' => ['1 level no data 3d6.dnd5e'],
            '1 level no data 4d6 all sources restrict playtest' => ['1 level no data 4d6 all sources restrict playtest.dnd5e'],
            '1 level no data 4d6 all sources' => ['1 level no data 4d6 all sources.dnd5e'],
            '1 level no data 4d6 srd race subrace class background trait' => ['1 level no data 4d6 srd race subrace class background trait.dnd5e'],
            '1 level no data 4d6 srd race subrace class background traits ideal bond flaw languages proficiencies' => ['1 level no data 4d6 srd race subrace class background traits ideal bond flaw languages proficiencies.dnd5e'],
            '1 level no data 4d6 srd race subrace class background traits ideal bond flaw languages' => ['1 level no data 4d6 srd race subrace class background traits ideal bond flaw languages.dnd5e'],
            '1 level no data 4d6 srd race subrace class background traits ideal bond flaw' => ['1 level no data 4d6 srd race subrace class background traits ideal bond flaw.dnd5e'],
            '1 level no data 4d6 srd race subrace class background traits ideal bond' => ['1 level no data 4d6 srd race subrace class background traits ideal bond.dnd5e'],
            '1 level no data 4d6 srd race subrace class background traits ideal' => ['1 level no data 4d6 srd race subrace class background traits ideal.dnd5e'],
            '1 level no data 4d6 srd race subrace class background traits' => ['1 level no data 4d6 srd race subrace class background traits.dnd5e'],
            '1 level no data 4d6 srd race subrace class background' => ['1 level no data 4d6 srd race subrace class background.dnd5e'],
            '1 level no data 4d6 srd race subrace class' => ['1 level no data 4d6 srd race subrace class.dnd5e'],
            '1 level no data 4d6 srd race subrace' => ['1 level no data 4d6 srd race subrace.dnd5e'],
            '1 level no data 4d6 srd race' => ['1 level no data 4d6 srd race.dnd5e'],
            '1 level no data 4d6 srd' => ['1 level no data 4d6 srd.dnd5e'],
            '1 level no data 4d6' => ['1 level no data 4d6.dnd5e'],
            '1 level no data point buy ahp feats multiclass' => ['1 level no data point buy ahp feats multiclass.dnd5e'],
            '1 level no data point buy ahp' => ['1 level no data point buy ahp.dnd5e'],
            '1 level no data point buy all sources restrict playtest' => ['1 level no data point buy all sources restrict playtest.dnd5e'],
            '1 level no data point buy all sources' => ['1 level no data point buy all sources.dnd5e'],
            '1 level no data point buy feats' => ['1 level no data point buy feats.dnd5e'],
            '1 level no data point buy multiclass' => ['1 level no data point buy multiclass.dnd5e'],
            '1 level no data point buy srd race subrace class background trait' => ['1 level no data point buy srd race subrace class background trait.dnd5e'],
            '1 level no data point buy srd race subrace class background traits ideal bond flaw languages proficiencies' => ['1 level no data point buy srd race subrace class background traits ideal bond flaw languages proficiencies.dnd5e'],
            '1 level no data point buy srd race subrace class background traits ideal bond flaw languages' => ['1 level no data point buy srd race subrace class background traits ideal bond flaw languages.dnd5e'],
            '1 level no data point buy srd race subrace class background traits ideal bond flaw' => ['1 level no data point buy srd race subrace class background traits ideal bond flaw.dnd5e'],
            '1 level no data point buy srd race subrace class background traits ideal bond' => ['1 level no data point buy srd race subrace class background traits ideal bond.dnd5e'],
            '1 level no data point buy srd race subrace class background traits ideal' => ['1 level no data point buy srd race subrace class background traits ideal.dnd5e'],
            '1 level no data point buy srd race subrace class background traits' => ['1 level no data point buy srd race subrace class background traits.dnd5e'],
            '1 level no data point buy srd race subrace class background' => ['1 level no data point buy srd race subrace class background.dnd5e'],
            '1 level no data point buy srd race subrace class' => ['1 level no data point buy srd race subrace class.dnd5e'],
            '1 level no data point buy srd race subrace' => ['1 level no data point buy srd race subrace.dnd5e'],
            '1 level no data point buy srd race' => ['1 level no data point buy srd race.dnd5e'],
            '1 level no data point buy srd' => ['1 level no data point buy srd.dnd5e'],
            '1 level no data point buy' => ['1 level no data point buy.dnd5e'],
            '1 level no data standard array all sources restrict playtest' => ['1 level no data standard array all sources restrict playtest.dnd5e'],
            '1 level no data standard array all sources' => ['1 level no data standard array all sources.dnd5e'],
            '1 level no data standard array srd race subrace class background trait' => ['1 level no data standard array srd race subrace class background trait.dnd5e'],
            '1 level no data standard array srd race subrace class background traits ideal bond flaw languages proficiencies' => ['1 level no data standard array srd race subrace class background traits ideal bond flaw languages proficiencies.dnd5e'],
            '1 level no data standard array srd race subrace class background traits ideal bond flaw languages' => ['1 level no data standard array srd race subrace class background traits ideal bond flaw languages.dnd5e'],
            '1 level no data standard array srd race subrace class background traits ideal bond flaw' => ['1 level no data standard array srd race subrace class background traits ideal bond flaw.dnd5e'],
            '1 level no data standard array srd race subrace class background traits ideal bond' => ['1 level no data standard array srd race subrace class background traits ideal bond.dnd5e'],
            '1 level no data standard array srd race subrace class background traits ideal' => ['1 level no data standard array srd race subrace class background traits ideal.dnd5e'],
            '1 level no data standard array srd race subrace class background traits' => ['1 level no data standard array srd race subrace class background traits.dnd5e'],
            '1 level no data standard array srd race subrace class background' => ['1 level no data standard array srd race subrace class background.dnd5e'],
            '1 level no data standard array srd race subrace class' => ['1 level no data standard array srd race subrace class.dnd5e'],
            '1 level no data standard array srd race subrace' => ['1 level no data standard array srd race subrace.dnd5e'],
            '1 level no data standard array srd race' => ['1 level no data standard array srd race.dnd5e'],
            '1 level no data standard array srd' => ['1 level no data standard array srd.dnd5e'],
            '1 level no data standard array' => ['1 level no data standard array.dnd5e'],
            'example' => ['example.dnd5e'],
        ];
    }

}