<?php

namespace Domain\Todo;

enum Priority: string
{
    case DEFAULT = 'default';
    case LOW = 'low';
    case HIGH = 'high';
}
