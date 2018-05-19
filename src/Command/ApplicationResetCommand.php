<?php
/**
 * Created by Noé Andrés Marcos.
 * Mail: nandrmarc@gmail.com
 * Date: 19/05/2018
 * Time: 19:43
 */

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ApplicationResetCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:reset')
            ->setDescription('Reset application.')
            ->setHelp('This command reset the application, dropping the database and re-building it again.')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (in_array($this->getContainer()->getParameter('kernel.environment'), ['dev', 'test'])) {

            // Drop database.
            $this->dropDatabase($output, [
                '--force'           => true,
                '--no-interaction'  => false,
                ''
            ]);

            // Create database.
            $this->createDatabase($output, [
                '--no-interaction'  => false,
                ''
            ]);

            // Execute migrations
            $this->executeMigrations($output);
        }
        else {
            $output->writeln('This command can not be executed on production environment.');
        }
    }

    /**
     * Drop database
     *
     * @param OutputInterface $output
     * @param array $arguments
     *
     * @throws \Exception
     */
    protected function dropDatabase(OutputInterface $output, $arguments = [''])
    {
        $output->writeln(' - Dropping database');
        $command = $this->getApplication()->find('d:d:d');
        $command->run(new ArrayInput($arguments), $output);
    }

    /**
     * Create database
     *
     * @param OutputInterface $output
     * @param array $arguments
     *
     * @throws \Exception
     */
    protected function createDatabase(OutputInterface $output, $arguments = [''])
    {
        $output->writeln(' - Creating database');
        $command = $this->getApplication()->find('d:d:c');
        $command->run(new ArrayInput($arguments), $output);
    }

    /**
     * Update database schema
     *
     * @param OutputInterface $output
     * @param array $arguments
     *
     * @throws \Exception
     */
    protected function updateDatabaseSchema(OutputInterface $output, $arguments = [''])
    {
        $output->writeln(' - Updating database schema');
        $command = $this->getApplication()->find('d:s:u');
        $command->run(new ArrayInput($arguments), $output);
    }

    /**
     * Execute Doctrine migrations
     *
     * @param OutputInterface $output
     * @param array $arguments
     *
     * @throws \Exception
     */
    protected function executeMigrations(OutputInterface $output, $arguments = [''])
    {
        $output->writeln(' - Executing migrations');
        $command = $this->getApplication()->find('doc:mig:mig');
        $input = new ArrayInput($arguments);
        $input->setInteractive(false);
        $command->run($input, $output);
    }
}
