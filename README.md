# my-public-work
# to run the WithdrawalMachine file use the php WithdrawalMachine.php command
following are the test scenarios:
Entry: 30.00 Result: [20.00 -&gt; 1, 10.00 -&gt; 1]
Entry: 80.00 Result: [50.00 -&gt; 1, 20.00 -&gt; 1, 10.00 -&gt; 1]
Entry: 125.00 Result: throw NoteUnavailableException
Entry: -130.00 Result: throw InvalidArgumentException
Entry: 3000 Result: throw NotEnoughNoteException
