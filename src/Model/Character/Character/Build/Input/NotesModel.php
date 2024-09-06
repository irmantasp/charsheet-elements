<?php

namespace App\Model\Character\Character\Build\Input;

use App\Model\Character\Character\Build\Input\Notes\NoteModel;
use JMS\Serializer\Annotation as Serializer;

#[Serializer\XmlRoot('notes')]
class NotesModel
{

    /**
     * @var NoteModel[]
     */
    #[Serializer\Type('array<' . \App\Model\Character\Character\Build\Input\Notes\NoteModel::class . '>')]
    #[Serializer\XmlList(entry: 'note', inline: true)]
    public array $notes;
}