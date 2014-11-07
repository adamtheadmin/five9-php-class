<?
class five9{

	CONST WSDL = "https://api.five9.com/wsadmin/AdminWebService?wsdl";
	private $client;

	public function __construct(){
		$this->connect();
	}

	public function connect(){
		try { 
		   $this->client = new SoapClient(self::WSDL, [
		   		'login' => '***',
		   		'password' => '***'
		   	]);
		} catch (Exception $e) { 
			var_dump($e);
		    echo $e->getMessage();
		} 
	}

	public function runReport($folder, $report, $criteria){
		try { 
			$run = $this->client->runReport([
				'folderName' => $folder,
				'reportName' => $report,
				'criteria' => $criteria
				]);
		} catch (Exception $e) { 
			echo $e->getMessage() . PHP_EOL;
			return false;
		} 
		$id = $run->return;
		do{
			sleep(2);
			try { 
				$return = $this->client->isReportRunning([
					'identifier' => $id,
					'timeout' => 1
					]);
				$running = !!($return->return);
			} catch (Exception $e) { 
				$running = false;
			}
		} while($running);

		try { 
			$report = $this->client->getReportResult([
				'identifier' => $id
				]);
		} catch (Exception $e) { 
			return false;
		}

		//make a pretty array for return
		$return = [];
		$headers = $report->return->header->values->data;

		if(isset($report->return->records))
			foreach($report->return->records as $record_id => $record){
				$row = $record->values->data;
				$returnRow = [];
				foreach($row as $colId => $val){
					$returnRow[$headers[$colId]] = $val;
				}
				$return[] = $returnRow;
			}

		return $return;

	}

	public function client(){
		return $this->client;
	}
}