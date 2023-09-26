<?php
class WithdrawalMachine {
    private $notes = [100, 50, 20, 10];
    private $noteCounts = [10, 10, 10, 10];

    public function withdraw($amount)
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Invalid withdrawal amount");
        }

        $withdrawnNotes = [];

        foreach ($this->notes as $note) {
            $noteCount = intval($amount / $note);
            // if (count($this->noteCounts) < 0) {
            //     throw new NotEnoughNoteException("NotEnoughNoteException");
            // }
            if ($noteCount > $this->noteCounts[array_search($note, $this->notes)]) {
                $noteCount = $this->noteCounts[array_search($note, $this->notes)];
            }

            if ($noteCount > 0) {
                $withdrawnNotes["$note.00"] = $noteCount;
                $amount -= $note * $noteCount;
                $this->noteCounts[array_search($note, $this->notes)] -= $noteCount;
            }

            if ($amount == 0) {
                return $withdrawnNotes;
            }
            if($this->noteCounts[0]==0 && $this->noteCounts[1]==0 && $this->noteCounts[2]==0 && $this->noteCounts[3]==0){
                throw new NotEnoughNoteException("NotEnoughNoteException");
            }
            
        }

        throw new NoteUnavailableException("NoteUnavailableException");
    }
}

class NoteUnavailableException extends Exception
{
}
class NotEnoughNoteException extends Exception
{
}

$withdrawalMachine = new WithdrawalMachine();

try {
    echo "Enter the withdrawal amount:";
    $handle = fopen("php://stdin", "r");
    $input = fgets($handle);
    $input = trim($input); // Remove trailing newline or whitespace
    fclose($handle);
    $intValue = (int)$input;
    $result = $withdrawalMachine->withdraw($intValue);

    if (empty($result)) {
        echo "[Empty Set]\n";
    } else {
        echo "Result: ";
        foreach ($result as $note => $count) {
            echo "[$note -> $count] ";
        }
        echo "\n";
    }
} catch (NoteUnavailableException $e) {
    echo "Result: " . $e->getMessage() . "\n";
}catch (NotEnoughNoteException $e) {
    echo "Result: " . $e->getMessage() . "\n";
}catch (InvalidArgumentException $e) {
    echo "Result: " . $e->getMessage() . "\n";
}

?>

