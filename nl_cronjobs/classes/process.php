<?php
/**
 * Launch a process
 * @author Nicolas Lescure
 * inspired by matous@havlena.net, from http://fr2.php.net/manual/fr/function.proc-open.php
 *
 */
class Process {
	
	/**
	 * Create a process.
	 * The process is connected to log files (1 for standard output and another one for error).
	 * @param string $executable Command line
	 * @param string $root Where to execute the command
	 * @param string $script Script to execute
	 * @param integer $maxExecutionTime Maximum time for each process
	 * @param string $outputFile Log file for standard output
	 * @param string $errorFile Log file for error output
	 */
	public function __construct($executable, $root, $script, $maxExecutionTime, $outputFile, $errorFile ) {
		$this->script = $script;
		$this->maxExecutionTime = $maxExecutionTime;
		$this->outputFile = $root.'/'.$outputFile;
		$this->errorFile = $root.'/'.$errorFile;
		
		$descriptorspec = array(
			0 => array('pipe', 'r'),
			1 => array('file', $this->outputFile, 'a'),
			2 => array('file', $this->errorFile, 'a')
		);
		
		//launch scripts
		$this->resource = proc_open("$executable $root/".$this->script, $descriptorspec, $this->pipes, null, null);
		$this->startTime = time();
	}
	
	/**
	 * Destruction of object : wait for the end of processus and close pipes
	 */
	public function __destruct() {
		fclose($this->pipes[0]);
		/*
    	echo stream_get_contents($this->pipes[1]);
    	fclose($this->pipes[1]);
    	echo stream_get_contents($this->pipes[2]);
    	fclose($this->pipes[2]);
    	*/
    	proc_close($this->resource);
	}
	 
	// is still running?
	public function isRunning() {
		$status = proc_get_status($this->resource);
		return $status["running"];
	}

	// long execution time, proccess is going to be killer
	public function isOverExecuted() {
		return ($this->startTime + $this->maxExecutionTime < time());
	}
	
	public function getScript() {
		return $this->script;
	}
	
	public function getMaxExecutionTime() {
		return $this->maxExecutionTime;
	}
	
	public function getStartTime() {
		return $this->startTime;
	}
	
	public function getResource() {
		return $this->resource;
	}
	
	public function getOutputFile() {
		return $this->outputFile;
	}
	
	public function getErrorFile() {
		return $this->errorFile;
	}
	
	public function setOutputFile($file) {
		$this->outputFile = $file;
	}
	
	public function setErrorFile($file) {
		$this->errorFile = $file;
	}
	
	private $resource;
	private $pipes;
	private $script;
	private $maxExecutionTime;
	private $startTime;
	private $outputFile;
	private $errorFile;

}
?>
