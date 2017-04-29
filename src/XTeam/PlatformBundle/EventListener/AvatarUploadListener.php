<?php

namespace XTeam\PlatformBundle\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use XTeam\PlatformBundle\Entity\User;
use XTeam\PlatformBundle\FileUploader;

class AvatarUploadListener
{
private $uploader;

public function __construct(FileUploader $uploader)
{
$this->uploader = $uploader;
}

public function prePersist(LifecycleEventArgs $args)
{
$entity = $args->getEntity();

$this->uploadFile($entity);
}

public function preUpdate(PreUpdateEventArgs $args)
{
$entity = $args->getEntity();

$this->uploadFile($entity);
}

private function uploadFile($entity)
{
// upload only works for Product entities
if (!$entity instanceof User) {
return;
}

$file = $entity->getAvatar();

// only upload new files
if (!$file instanceof UploadedFile) {
return;
}

$fileName = $this->uploader->upload($file);
$entity->setAvatar($fileName);
}

}