<?php

if (!defined('TYPO3_MODE')) die ('Access denied.');

# Use Flux Core API for registering extension provider.
\FluidTYPO3\Flux\Core::registerProviderExtensionKey('Ecodev.speciality', 'Page');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey('Ecodev.speciality', 'Content');