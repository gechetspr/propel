<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Propel\Communication\Console;

use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Spryker\Zed\Propel\Business\PropelFacade getFacade()
 */
class DatabaseImportConsole extends Console
{
    const COMMAND_NAME = 'propel:database:import';
    const COMMAND_DESCRIPTION = 'Import an existing backup file.';

    const ARGUMENT_BACKUP_PATH = 'backup-path';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName(static::COMMAND_NAME);
        $this->setDescription(static::COMMAND_DESCRIPTION);

        $this->addArgument(static::ARGUMENT_BACKUP_PATH, InputArgument::REQUIRED, 'Path where backup file could be found.');

        parent::configure();
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->info(static::COMMAND_DESCRIPTION);

        $this->getFacade()->importDatabase($input->getArgument(static::ARGUMENT_BACKUP_PATH));
    }
}